<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Handles Native Quoted Printable (Q) Header Encoding in Swift Mailer.
 *
 * @package    Swift
 * @subpackage Mime
 * @author     Christian Fuentes
 */
class Swift_Mime_HeaderEncoder_QpNativeHeaderEncoder extends Swift_Encoder_QpNativeEncoder implements Swift_Mime_HeaderEncoder
{
    /**
     * Creates a new QpNativeHeaderEncoder for the given CharacterStream.
     *
     * @param Swift_CharacterStream $charStream to use for reading characters
     */
    public function __construct(Swift_CharacterStream $charStream)
    {
        parent::__construct($charStream);
    }

    /**
     * Get the name of this encoding scheme.
     *
     * Returns the string 'QNative'.
     *
     * @return string
     */
    public function getName()
    {
        return 'QNative';
    }

    /**
     * Takes an unencoded string and produces a native QP encoded string from it.
     *
     * @param string  $string          string to encode
     *
     * @return string
     */
    public function encodeString($string)
    {
        return str_replace(array(' ', '=20', "=\r\n"), array('_', '_', "\r\n"),
            parent::encodeString($string, 0, 0)
        );
    }
}
