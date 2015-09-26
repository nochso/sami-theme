<?php

namespace nochso\SamiTheme;

use Twig_Token;

class MinifyHtmlTokenParser extends \Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $lineno = $token->getLine();
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideMinifyHtmlEnd'), true);
        $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

        return new MinifyHtmlNode(array('body' => $body), array(), $lineno, $this->getTag());
    }

    public function getTag()
    {
        return 'minify_html';
    }

    public function decideMinifyHtmlEnd(Twig_Token $token)
    {
        return $token->test('end_minify_html');
    }
}
