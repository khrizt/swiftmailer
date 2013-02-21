<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Handles Native Quoted Printable (QPNative) Encoding in Swift Mailer.
 *
 * @package    Swift
 * @subpackage Encoder
 * @author     Christian Fuentes
 */
class Swift_Encoder_QpNativeEncoder implements Swift_Encoder
{
    /**
     * The CharacterStream used for reading characters (as opposed to bytes).
     *
     * @var Swift_CharacterStream
     */
    protected $_charStream;

    /**
     * A filter used if input should be canonicalized.
     *
     * @var Swift_StreamFilter
     */
    protected $_filter;

    /**
     * Creates a new QpEncoder for the given CharacterStream.
     *
     * @param Swift_CharacterStream $charStream to use for reading characters
     * @param Swift_StreamFilter    $filter     if input should be canonicalized
     */
    public function __construct(Swift_CharacterStream $charStream, Swift_StreamFilter $filter = null)
    {
        $this->_charStream = $charStream;
        $this->_filter = $filter;
    }

    // necessary?
    public function __sleep()
    {
        return array('_charStream', '_filter');
    }

    // necessary?
    public function __wakeup()
    {

    }

    /**
     * Takes an unencoded string and produces a Native QP encoded string from it.
     *
     * QP encoded strings have a maximum line length of 76 characters.
     * If the first line needs to be shorter, indicate the difference with
     * $firstLineOffset.
     *
     * @param string  $string to encode
     * @param integer $firstLineOffset, optional
     * @param integer $maxLineLength,   optional 0 indicates the default of 76 chars
     *
     * @return string
     */
    public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0)
    {
        return quoted_printable_encode($string);
    }

    /**
     * Updates the charset used.
     *
     * @param string $charset
     */
    public function charsetChanged($charset)
    {
        $this->_charStream->setCharacterSet($charset);
    }
}
