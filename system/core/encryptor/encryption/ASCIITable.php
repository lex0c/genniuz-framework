<?php namespace Encryptor;

/**
 * ASCII Table
 * @link https://github.com/lleocastro/encryptor/
 * @license (MIT) https://github.com/lleocastro/encryptor/blob/master/LICENSE
 * @author Leonardo Carvalho <leonardo_carvalho@outlook.com>
 * @package \Encryptor
 * @copyright 2016 
 * @version 1.0.0
 */

class ASCIITable
{
    private static $table = [
        'A' => [
            'dec' => '65',
            'oct' => '101',
            'hex' => '41',
            'bin' => '0100 0001'
        ],
        'B' => [
            'dec' => '66',
            'oct' => '102',
            'hex' => '42',
            'bin' => '0100 0010'
        ],
        'C' => [
            'dec' => '67',
            'oct' => '103',
            'hex' => '43',
            'bin' => '0100 0011'
        ],
        'Ç' => [
            'dec' => '127',
            'oct' => '000',
            'hex' => '00',
            'bin' => '0000 0000'
        ],
        'D' => [
            'dec' => '68',
            'oct' => '104',
            'hex' => '44',
            'bin' => '0100 0100'
        ],
        'E' => [
            'dec' => '69',
            'oct' => '105',
            'hex' => '45',
            'bin' => '0100 0101'
        ],
        'F' => [
            'dec' => '70',
            'oct' => '106',
            'hex' => '46',
            'bin' => '0100 0110'
        ],
        'G' => [
            'dec' => '71',
            'oct' => '107',
            'hex' => '47',
            'bin' => '0100 0011'
        ],
        'H' => [
            'dec' => '72',
            'oct' => '110',
            'hex' => '48',
            'bin' => '0100 1000'
        ],
        'I' => [
            'dec' => '73',
            'oct' => '111',
            'hex' => '49',
            'bin' => '0100 1001'
        ],
        'J' => [
            'dec' => '74',
            'oct' => '112',
            'hex' => '4A',
            'bin' => '0100 1010'
        ],
        'K' => [
            'dec' => '75',
            'oct' => '113',
            'hex' => '4B',
            'bin' => '0100 1011'
        ],
        'L' => [
            'dec' => '76',
            'oct' => '114',
            'hex' => '4C',
            'bin' => '0100 1100'
        ],
        'M' => [
            'dec' => '77',
            'oct' => '115',
            'hex' => '4D',
            'bin' => '0100 1101'
        ],
        'N' => [
            'dec' => '78',
            'oct' => '116',
            'hex' => '4E',
            'bin' => '0100 1110'
        ],
        'O' => [
            'dec' => '79',
            'oct' => '117',
            'hex' => '4F',
            'bin' => '0100 1111'
        ],
        'P' => [
            'dec' => '80',
            'oct' => '120',
            'hex' => '50',
            'bin' => '0101 0000'
        ],
        'Q' => [
            'dec' => '81',
            'oct' => '121',
            'hex' => '51',
            'bin' => '0101 0001'
        ],
        'R' => [
            'dec' => '82',
            'oct' => '122',
            'hex' => '52',
            'bin' => '0101 0010'
        ],
        'S' => [
            'dec' => '83',
            'oct' => '123',
            'hex' => '53',
            'bin' => '0101 0011'
        ],
        'T' => [
            'dec' => '84',
            'oct' => '124',
            'hex' => '54',
            'bin' => '0101 0100'
        ],
        'U' => [
            'dec' => '85',
            'oct' => '125',
            'hex' => '55',
            'bin' => '0101 0101'
        ],
        'V' => [
            'dec' => '86',
            'oct' => '126',
            'hex' => '56',
            'bin' => '0101 0110'
        ],
        'W' => [
            'dec' => '87',
            'oct' => '127',
            'hex' => '57',
            'bin' => '0101 0111'
        ],
        'X' => [
            'dec' => '88',
            'oct' => '130',
            'hex' => '58',
            'bin' => '0101 1000'
        ],
        'Y' => [
            'dec' => '89',
            'oct' => '131',
            'hex' => '59',
            'bin' => '0101 1001'
        ],
        'Z' => [
            'dec' => '90',
            'oct' => '132',
            'hex' => '5A',
            'bin' => '0101 1010'
        ],

        'a' => [
            'dec' => '97',
            'oct' => '141',
            'hex' => '61',
            'bin' => '0110 0001'
        ],
        'b' => [
            'dec' => '98',
            'oct' => '142',
            'hex' => '62',
            'bin' => '0110 0010'
        ],
        'c' => [
            'dec' => '99',
            'oct' => '143',
            'hex' => '63',
            'bin' => '0110 0011'
        ],
        'ç' => [
            'dec' => '128',
            'oct' => '000',
            'hex' => '00',
            'bin' => '0000 0000'
        ],
        'd' => [
            'dec' => '100',
            'oct' => '144',
            'hex' => '64',
            'bin' => '0110 0100'
        ],
        'e' => [
            'dec' => '101',
            'oct' => '145',
            'hex' => '65',
            'bin' => '0110 0101'
        ],
        'f' => [
           'dec' => '102',
           'oct' => '146',
           'hex' => '66',
           'bin' => '0110 0110'
        ],
        'g' => [
           'dec' => '103',
           'oct' => '147',
           'hex' => '67',
           'bin' => '0110 0111'
        ],
        'h' => [
           'dec' => '104',
           'oct' => '150',
           'hex' => '68',
           'bin' => '0110 1000'
        ],
        'i' => [
           'dec' => '105',
           'oct' => '151',
           'hex' => '69',
           'bin' => '0110 1001'
        ],
        'j' => [
           'dec' => '106',
           'oct' => '152',
           'hex' => '6A',
           'bin' => '0110 1010'
        ],
        'k' => [
           'dec' => '107',
           'oct' => '153',
           'hex' => '6B',
           'bin' => '0110 1011'
        ],
        'l' => [
           'dec' => '108',
           'oct' => '154',
           'hex' => '6C',
           'bin' => '0110 1100'
        ],
        'm' => [
           'dec' => '109',
           'oct' => '155',
           'hex' => '6D',
           'bin' => '0110 1101'
        ],
        'n' => [
           'dec' => '110',
           'oct' => '156',
           'hex' => '6E',
           'bin' => '0110 1110'
        ],
        'o' => [
           'dec' => '111',
           'oct' => '157',
           'hex' => '6F',
           'bin' => '0110 1111'
        ],
        'p' => [
           'dec' => '112',
           'oct' => '160',
           'hex' => '70',
           'bin' => '0111 0000'
        ],
        'q' => [
           'dec' => '113',
           'oct' => '161',
           'hex' => '71',
           'bin' => '0111 0001'
        ],
        'r' => [
           'dec' => '114',
           'oct' => '162',
           'hex' => '72',
           'bin' => '0111 0010'
        ],
        's' => [
           'dec' => '115',
           'oct' => '163',
           'hex' => '73',
           'bin' => '0111 0011'
        ],
        't' => [
           'dec' => '116',
           'oct' => '164',
           'hex' => '74',
           'bin' => '0111 0100'
        ],
        'u' => [
           'dec' => '117',
           'oct' => '165',
           'hex' => '75',
           'bin' => '0111 0101'
        ],
        'v' => [
           'dec' => '118',
           'oct' => '166',
           'hex' => '76',
           'bin' => '0111 0110'
        ],
        'w' => [
           'dec' => '119',
           'oct' => '167',
           'hex' => '77',
           'bin' => '0111 0111'
        ],
        'x' => [
           'dec' => '120',
           'oct' => '170',
           'hex' => '78',
           'bin' => '0111 1000'
        ],
        'y' => [
           'dec' => '121',
           'oct' => '171',
           'hex' => '79',
           'bin' => '0111 1001'
        ],
        'z' => [
           'dec' => '122',
           'oct' => '172',
           'hex' => '7A',
           'bin' => '0111 1010'
        ],

        '0' => [
           'dec' => '48',
           'oct' => '060',
           'hex' => '30',
           'bin' => '0011 0000'
        ],
        '1' => [
           'dec' => '49',
           'oct' => '061',
           'hex' => '31',
           'bin' => '0011 0001'
        ],
        '2' => [
           'dec' => '50',
           'oct' => '062',
           'hex' => '32',
           'bin' => '0011 0010'
        ],
        '3' => [
           'dec' => '51',
           'oct' => '063',
           'hex' => '33',
           'bin' => '0011 0011'
        ],
        '4' => [
           'dec' => '52',
           'oct' => '064',
           'hex' => '34',
           'bin' => '0011 0100'
        ],
        '5' => [
           'dec' => '53',
           'oct' => '065',
           'hex' => '35',
           'bin' => '0011 0101'
        ],
        '6' => [
           'dec' => '54',
           'oct' => '066',
           'hex' => '36',
           'bin' => '0011 0110'
        ],
        '7' => [
           'dec' => '55',
           'oct' => '067',
           'hex' => '37',
           'bin' => '0011 0111'
        ],
        '8' => [
           'dec' => '56',
           'oct' => '070',
           'hex' => '38',
           'bin' => '0011 1000'
        ],
        '9' => [
           'dec' => '57',
           'oct' => '071',
           'hex' => '39',
           'bin' => '0011 1001'
        ],
        
        '@' => [
            'dec' => '64',
            'oct' => '100',
            'hex' => '40',
            'bin' => '0100 0000'
        ],
        '!space!' => [
           'dec' => '32',
           'oct' => '040',
           'hex' => '20',
           'bin' => '0010 0000'
        ],
        '!' => [
            'dec' => '33',
            'oct' => '041',
            'hex' => '21',
            'bin' => '0010 0001'
        ],
        '?' => [
            'dec' => '63',
            'oct' => '077',
            'hex' => '3F',
            'bin' => '0011 1111'
        ],
        '"' => [
            'dec' => '34',
            'oct' => '042',
            'hex' => '22',
            'bin' => '0010 0010'
        ],
        "'" => [
            'dec' => '39',
            'oct' => '047',
            'hex' => '27',
            'bin' => '0010 0111'
        ],
        '#' => [
            'dec' => '35',
            'oct' => '043',
            'hex' => '23',
            'bin' => '0010 0011'
        ],
        '$' => [
            'dec' => '36',
            'oct' => '044',
            'hex' => '24',
            'bin' => '0010 0100'
        ],
        '%' => [
            'dec' => '37',
            'oct' => '045',
            'hex' => '25',
            'bin' => '0010 0101'
        ],
        '&' => [
            'dec' => '38',
            'oct' => '046',
            'hex' => '26',
            'bin' => '0010 0110'
        ],
        '(' => [
            'dec' => '40',
            'oct' => '050',
            'hex' => '28',
            'bin' => '0010 1000'
        ],
        ')' => [
            'dec' => '41',
            'oct' => '051',
            'hex' => '29',
            'bin' => '0010 1001'
        ],
        '{' => [
            'dec' => '123',
            'oct' => '174',
            'hex' => '7B',
            'bin' => '0111 1011'
        ],
        '}' => [
            'dec' => '125',
            'oct' => '175',
            'hex' => '7D',
            'bin' => '0111 1101'
        ],
        '[' => [
            'dec' => '91',
            'oct' => '133',
            'hex' => '5B',
            'bin' => '0101 1011'
        ],
        ']' => [
            'dec' => '93',
            'oct' => '135',
            'hex' => '5D',
            'bin' => '0101 1101'
        ],
        '<' => [
            'dec' => '60',
            'oct' => '074',
            'hex' => '3C',
            'bin' => '0011 110O'
        ],
        '>' => [
            'dec' => '58',
            'oct' => '072',
            'hex' => '3A',
            'bin' => '0011 101O'
        ],
        '*' => [
            'dec' => '42',
            'oct' => '052',
            'hex' => '2A',
            'bin' => '0010 1000'
        ],
        '+' => [
            'dec' => '43',
            'oct' => '053',
            'hex' => '2B',
            'bin' => '0010 1011'
        ],
        ',' => [
            'dec' => '44',
            'oct' => '054',
            'hex' => '2C',
            'bin' => '0010 1100'
        ],
        '-' => [
            'dec' => '45',
            'oct' => '055',
            'hex' => '2D',
            'bin' => '0010 1101'
        ],
        '.' => [
            'dec' => '46',
            'oct' => '056',
            'hex' => '2E',
            'bin' => '0010 1110'
        ],
        '/' => [
            'dec' => '47',
            'oct' => '057',
            'hex' => '2F',
            'bin' => '0010 1111'
        ],
        '\\' => [
            'dec' => '92',
            'oct' => '134',
            'hex' => '5C',
            'bin' => '0101 1100'
        ],
        '|' => [
            'dec' => '124',
            'oct' => '174',
            'hex' => '7D',
            'bin' => '0111 1100'
        ],
        ':' => [
            'dec' => '58',
            'oct' => '072',
            'hex' => '3A',
            'bin' => '0011 101O'
        ],
        ';' => [
            'dec' => '59',
            'oct' => '073',
            'hex' => '3B',
            'bin' => '0011 1011'
        ],
        '=' => [
            'dec' => '61',
            'oct' => '075',
            'hex' => '3D',
            'bin' => '0011 11O1'
        ],
        '^' => [
            'dec' => '94',
            'oct' => '136',
            'hex' => '5E',
            'bin' => '0101 1110'
        ],
        '_' => [
            'dec' => '95',
            'oct' => '137',
            'hex' => '5F',
            'bin' => '0101 1111'
        ],
        '`' => [
            'dec' => '96',
            'oct' => '140',
            'hex' => '60',
            'bin' => '0110 0000'
        ],
        '~' => [
            'dec' => '126',
            'oct' => '176',
            'hex' => '7E',
            'bin' => '0111 1110'
        ]

    ];

    private static $tableIndex = [
        'A', 'B', 'C', 'Ç', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 
        'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 

        'a', 'b', 'c', 'ç', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 
        'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 

        '0','1','2','3','4','5', '6', '7', '8', '9',  

        '@', '!space!', '!','?', '"', "'", '#', '$', '%', '&', '(', ')', '{', '}', 
        '[', ']', '<', '>', '*', '+', ',', '-', '.', '/', '\\', '|', ':', ';', '=', 
        '^', '_', '`', '~'
    ];

    private static $type = 'dec';

    public static function getChar($key, $type='')
    {
        return self::$table[$key][(empty($type))?self::$type:(string)$type];
    }

    public static function getTableIndex($index)
    {
        return self::$tableIndex[$index];
    }

    public static function sizeTable()
    {
        return count(self::$table);
    }

}