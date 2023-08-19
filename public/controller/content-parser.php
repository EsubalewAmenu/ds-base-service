<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/EsubalewAmenu
 * @since      1.0.0
 *
 * @package    ds_quiz
 * @subpackage ds_quiz/admin
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    ds_quiz
 * @subpackage ds_quiz/admin
 * @author     Esubalew Amenu <esubalew.a2009@gmail.com>
 */
class DS_content_parser_public
{

    public function __construct()
    {
    }

    public function json_data_validation($json_data, $param)
    {

        $allPairsNotEmpty = true;
        $allowedKeys = ["title", "p", "code", "image", "ul"];
        $validkey = true;

        foreach ($json_data as $pair) {
            foreach ($pair as $value) {

                $keys = array_keys($pair);
                if (!in_array($keys[0], $allowedKeys)) {
                    $validkey = false;
                    break 2; // Break out of both loops
                }

                if (empty($value)) {
                    $allPairsNotEmpty = false;
                    break 2; // Break out of both loops
                }
            }
        }

        if (!$allPairsNotEmpty) {
            $error = new WP_Error();
            $error->add("empty_pair", __("All pairs of '" . $param . "' should not be empty.", 'wp-rest-courses'), array('status' => 400));
            return $error;
        }
        if (!$validkey) {
            $error = new WP_Error();
            $error->add("unknown_key", __("Allowed keys of '" . $param . "' are " . implode(", ", $allowedKeys) . " only.", 'wp-rest-courses'), array('status' => 400));
            return $error;
        }
        return 1;
    }
    public function parse_lesson_content($lesson_contents)
    {

        $post_content = "";

        foreach ($lesson_contents as $lesson_content) {

            $key = key($lesson_content);
            $value = $lesson_content[$key];

            if ($key === 'title')
                $post_content .= self::extract_title($value) . "\n";
            else if ($key === 'p')
                $post_content .= self::extract_p($value) . "\n";
            else if ($key === 'code')
                $post_content .= self::extract_code($value) . "\n";
            else if ($key === 'image')
                $post_content .= self::extract_image($value) . "\n";
            else if ($key === 'ul')
                $post_content .= self::extract_ul($value) . "\n";
        }

        return $post_content;
    }
    function extract_title($title)
    {
        return "<!-- wp:heading -->\n<h2>" . $title . "</h2>\n<!-- /wp:heading -->\n";
    }
    function extract_p($p)
    {
        return "<!-- wp:paragraph -->\n<p>" . $p . "</p>\n<!-- /wp:paragraph -->\n";
    }
    function extract_code($code)
    {
        return "<!-- wp:code -->\n<pre class=\"wp-block-code\"><code>" . $code . "</code></pre>\n<!-- /wp:code -->\n";
    }
    function extract_ul($ul)
    {
        $ulData = "<!-- wp:list -->\n<ul>";
        if (is_array($ul)) {
            foreach ($ul as $li) {
                $ulData .= "\n<!-- wp:list-item -->\n<li>" . $li['li'] . "</li>\n<!-- /wp:list-item -->\n";
            }
        }
        $ulData .= "</ul>\n<!-- /wp:list -->";
        return $ulData;
    }
    function extract_image($base64_image)
    {

        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');

        // Remove data URI scheme and get the image data
        $image_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64_image));


        // Determine the MIME type of the image
        $finfo = finfo_open();
        $mime_type = finfo_buffer($finfo, $image_data, FILEINFO_MIME_TYPE);
        finfo_close($finfo);


        // Create a unique filename for the image
        $filename = wp_unique_filename(wp_upload_dir()['path'], 'image.png');

        // Save the image to the uploads directory
        $file_path = wp_upload_bits($filename, null, $image_data);

        // Check if the file was successfully saved
        if (!$file_path['error']) {
            // Create the attachment data

            $attachment = array(
                'post_title'     => 'Image Attachment',
                'post_mime_type' => $mime_type,
                'post_content'   => '',
                'post_status'    => 'inherit'
            );

            // Insert the attachment into the media library
            $attachment_id = wp_insert_attachment($attachment, $file_path['file']);

            // Generate metadata for the attachment
            $attachment_data = wp_generate_attachment_metadata($attachment_id, $file_path['file']);

            // Update the attachment metadata
            wp_update_attachment_metadata($attachment_id, $attachment_data);

            // Create the post content with the image
            $post_content = '<!-- wp:image {\\"id\\":' . $attachment_id . ',\\"sizeSlug\\":\\"large\\",\\"linkDestination\\":\\"none\\"} --><figure class=\\"wp-block-image size-large\\"><img src=\\"' . $file_path["url"] . '\\" alt=\\"\\" class=\\"wp-image-' . $attachment_id . '\\"/></figure><!-- /wp:image -->';

            return $post_content;
        } else {
            // Display error message or handle the error
            echo 'Error saving image: ' . $file_path['error'];
        }
        return null;
    }


    function contentToJson($html)
    {
        // Use regex to extract the relevant information from the HTML blocks
        preg_match_all('/<!-- (.*?) -->\n*(.*?)\n*<!-- \/.*? -->/s', $html, $matches);

        // Store the information in a nested array based on h1 tags
        $data = array();
        $section = null;
        foreach ($matches[1] as $i => $match) {
            $tag = "";
            $content = "";
            preg_match('/<([a-z][a-z0-9]*)(?:\s[^>]*)?>.*?<\/\1>/is', $matches[2][$i], $tag_matches);
            if (isset($tag_matches[1])) {
                $tag = $tag_matches[1];
                if ($tag === 'figure') {
                    $result = self::extractFigureContent($matches[2][$i]);
                    $tag = array_keys($result)[0];
                    $content = $result[$tag];
                } else {
                    $content = trim(strip_tags($matches[2][$i]));
                }
            } else {
                $content = trim($matches[2][$i]);
            }
            if ($tag === 'h1' || $tag === 'h2') {
                if ($section) {
                    $data[] = $section;
                }
                $section = array();
            } else if ($tag === 'p' && str_starts_with($content, '{{--question-')) {

                $taxonomy_slug = substr($content, 13, -4);

                $term = get_term_by('slug', $taxonomy_slug, 'ds_quiz_questions');

                $content = $term;

                if ($term) {
                    $term_metas = get_term_meta($term->term_id);

                    for ($i = 0; $i < count($term_metas); $i++) {
                        $keys = array_keys($term_metas);
                        $content = [$keys[$i] => $term_metas[$keys[$i]]];
                    }
                } else {
                    $content = "Error on question. Content the developers.";
                }
            }
            $section[] = array(
                "type" => $tag,
                "content" => $content
            );
        }
        if ($section) {
            $data[] = $section;
        }
        return $data;
    }

    function extractFigureContent($figureHtml)
    {
        preg_match('/<figure.*?>(.*?)<\/figure>/is', $figureHtml, $figureMatches);
        $figureContent = $figureMatches[1];

        $content = array();

        // Extract image
        preg_match('/<img.*?src="(.*?)".*?>/is', $figureContent, $imgMatches);
        if (isset($imgMatches[1])) {
            $content['img'] = $imgMatches[1];
        }

        // Extract table
        preg_match('/<table.*?>(.*?)<\/table>/is', $figureContent, $tableMatches);
        if (isset($tableMatches[1])) {
            // $content['table'] = self::extractTableData($tableMatches[1]);
            $content['table'] = self::extractTableData($tableMatches[1]);
        }

        return $content;
    }

    function extractTableData($tableHtml)
    {
        preg_match_all('/<tr>(.*?)<\/tr>/s', $tableHtml, $rowMatches);
        $tableData = array();
        foreach ($rowMatches[1] as $rowHtml) {
            preg_match_all('/<t[dh]>(.*?)<\/t[dh]>/s', $rowHtml, $cellMatches);
            $row = array();
            foreach ($cellMatches[1] as $cellHtml) {
                $row[] = trim(strip_tags($cellHtml));
            }
            $tableData[] = $row;
        }
        return $tableData;
    }
}
