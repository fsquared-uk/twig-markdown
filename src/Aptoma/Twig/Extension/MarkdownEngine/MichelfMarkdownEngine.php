<?php

namespace Aptoma\Twig\Extension\MarkdownEngine;

use Aptoma\Twig\Extension\MarkdownEngineInterface;
use Michelf\MarkdownExtra;

/**
 * MichelfMarkdownEngine.php
 *
 * Maps Michelf\MarkdownExtra to Aptoma\Twig Markdown Extension
 *
 * @author Joris Berthelot <joris@berthelot.tel>
 */
class MichelfMarkdownEngine implements MarkdownEngineInterface
{
    /**
     * Constructor
     * 
     * @param bool $no_markup   prevents HTML tags in the input 
     *                          being passed to the output
     * @param bool $no_entities prevents HTML entities being
     *                          passed verbatim to the output
     * $param string $url_filter_func filter function for URLs
     */
    public function __construct( $no_markup = true, $no_entities = true, $url_filter_func = null )
    {
        $this->parser = new MarkdownExtra;
        $this->parser->no_markup = $no_markup;
        $this->parser->no_entities = $no_entities;
        $this->parser->url_filter_func = $url_filter_func;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($content)
    {
        return $this->parser->transform($content);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Michelf\Markdown';
    }

    private $parser;
}
