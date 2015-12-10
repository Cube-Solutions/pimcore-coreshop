TRUNCATE TABLE coreshop_currency;
TRUNCATE TABLE coreshop_country;

INSERT INTO `coreshop_currency` (`id`, `name`, `isoCode`, `numericIsoCode`, `symbol`, `exchangeRate`) VALUES
(1,	'Euro',	'EUR',	'978',	'€',	1.2),
(6,	'UAE Dirham',	'AED',	'784',	'د.إ',	1),
(7,	'East Caribbean Dollar',	'XCD',	'951',	'$',	1),
(8,	'Netherlands Antilles Guilder',	'ANG',	'532',	'ƒ',	1),
(9,	'US Dollars',	'USD',	'840',	'$',	1),
(10,	'Australian Dollars',	'AUD',	'036',	'$',	1),
(11,	'Aruban Florin',	'AWG',	'533',	'ƒ',	1),
(12,	'Azerbaijanian Manat',	'AZN',	'944',	'ман',	1),
(13,	'Marka',	'BAM',	'977',	'KM',	1),
(14,	'Barbados Dollar',	'BBD',	'052',	'$',	1),
(15,	'Bangladeshi Taka',	'BDT',	'050',	'৳',	1),
(16,	'Brazilian Real',	'BRL',	'986',	'R$',	1),
(17,	'Bahamian Dollar',	'BSD',	'044',	'$',	1),
(18,	'Norwegian Krone',	'NOK',	'578',	'kr',	1),
(19,	'Belarussian Rouble',	'BYR',	'974',	'p.',	1),
(20,	'Canadian Dollars',	'CAD',	'124',	'$',	1),
(21,	'New Zealand Dollars',	'NZD',	'554',	'$',	1),
(22,	'Chinese Renminbi Yuan',	'CNY',	'156',	'¥',	1),
(23,	'Costa Rican Colon',	'CRC',	'188',	'₡',	1),
(24,	'Czech Koruna',	'CZK',	'203',	'Kč',	1),
(25,	'Danish Krone',	'DKK',	'208',	'kr',	1),
(26,	'Dominican Republic Peso',	'DOP',	'214',	'RD$',	1),
(27,	'Estonia Kroon',	'EEK',	'233',	'kr',	1),
(28,	'Egyptian Pound',	'EGP',	'818',	'£',	1),
(29,	'Eritrean Nakfa',	'ERN',	'232',	'Nfa',	1),
(30,	'British Pounds Sterling',	'GBP',	'826',	'£',	1),
(31,	'Georgian Lari',	'GEL',	'981',	'GEL',	1),
(32,	'Ghana Cedi',	'GHC',	'288',	'¢',	1),
(33,	'Gibraltar Pound',	'GIP',	'292',	'£',	1),
(34,	'Guatemala Quetzal',	'GTQ',	'320',	'Q',	1),
(35,	'Hong Kong Dollars',	'HKD',	'344',	'$',	1),
(36,	'Honduras Lempira',	'HNL',	'340',	'L',	1),
(37,	'Croatia Kuna',	'HRK',	'191',	'kn',	1),
(38,	'Hungary Forint',	'HUF',	'348',	'Ft',	1),
(39,	'Indonesia Rupiah',	'IDR',	'360',	'Rp',	1),
(40,	'Israel Shekel',	'ILS',	'376',	'₪',	1),
(41,	'Indian Rupee',	'INR',	'356',	'₹',	1),
(42,	'Jamaican Dollar',	'JMD',	'388',	'J$',	1),
(43,	'Japanese yen',	'JPY',	'392',	'¥',	1),
(44,	'Kenyan Shilling',	'KES',	'404',	'KSh',	1),
(45,	'Cambodia Riel',	'KHR',	'116',	'៛',	1),
(46,	'North Korean Won',	'KPW',	'408',	'₩',	1),
(47,	'South Korean Won',	'KRW',	'410',	'₩',	1),
(48,	'Kuwaiti Dinar',	'KWD',	'414',	'د.ك',	1),
(49,	'Cayman Islands Dollar',	'KYD',	'136',	'$',	1),
(50,	'Kazakhstan Tenge',	'KZT',	'368',	'лв',	1),
(51,	'Lebanese Pound',	'LBP',	'422',	'£',	1),
(52,	'Swiss Francs',	'CHF',	'756',	'CHF',	1),
(53,	'Sri Lankan Rupee',	'LKR',	'144',	'₨',	1),
(54,	'South African Rand',	'ZAR',	'710',	'R',	1),
(55,	'Lithuania Litas',	'LTL',	'440',	'Lt',	1),
(56,	'Latvia Lat',	'LVL',	'428',	'Ls',	1),
(57,	'Macau Pataca',	'MOP',	'446',	'MOP$',	1),
(58,	'Mauritius Rupee',	'MUR',	'480',	'₨',	1),
(59,	'Malaysian Ringgit',	'MYR',	'458',	'RM',	1),
(60,	'Nigeria Naira',	'NGN',	'566',	'₦',	1),
(61,	'Nicaragua Cordoba',	'NIO',	'558',	'C$',	1),
(62,	'Nepalese Rupee',	'NPR',	'524',	'₨',	1),
(63,	'Omani Riyal',	'OMR',	'512',	'﷼',	1),
(64,	'Philippine Pesos',	'PHP',	'608',	'₱',	1),
(65,	'Pakistani Rupee',	'PKR',	'586',	'₨',	1),
(66,	'Paraguay Guarani',	'PYG',	'600',	'Gs',	1),
(67,	'Qatari Riyal',	'QAR',	'634',	'﷼',	1),
(68,	'Russian Federation Ruble',	'RUB',	'643',	'руб',	1),
(69,	'Saudi Riyal',	'SAR',	'682',	'﷼',	1),
(70,	'Seychelles Rupee',	'SCR',	'690',	'₨',	1),
(71,	'Swedish Krona',	'SEK',	'752',	'kr',	1),
(72,	'Singapore Dollars',	'SGD',	'702',	'$',	1),
(73,	'Thai Baht',	'THB',	'764',	'฿',	1),
(74,	'Trinidad and Tobago Dollar',	'TTD',	'780',	'TT$',	1),
(75,	'New Taiwanese Dollars',	'TWD',	'901',	'NT$',	1),
(76,	'Tanzanian Shilling',	'TZS',	'834',	'x/y',	1),
(77,	'United States dollar ',	'USS',	'998',	'$',	0.8),
(78,	'Uzbekistani Som',	'UZS',	'860',	'лв',	1);

INSERT INTO `coreshop_country` (`id`, `name`, `isoCode`, `active`, `currency__id`) VALUES
(1,	'Andorra',	'AD',	0,	1),
(2,	'United Arab Emirates',	'AE',	0,	6),
(3,	'Antigua and Barbuda',	'AG',	0,	7),
(4,	'Anguilla',	'AI',	0,	7),
(5,	'Netherlands Antilles',	'AN',	0,	8),
(6,	'American Samoa',	'AS',	0,	9),
(7,	'Austria',	'AT',	1,	1),
(8,	'Australia',	'AU',	0,	10),
(9,	'Aruba',	'AW',	0,	11),
(10,	'Azerbaijan',	'AZ',	0,	12),
(11,	'Bosnia and Herzegovina',	'BA',	0,	13),
(12,	'Barbados',	'BB',	0,	14),
(13,	'Bangladesh',	'BD',	0,	15),
(14,	'Belgium',	'BE',	0,	1),
(15,	'Brazil',	'BR',	0,	16),
(16,	'Bahamas',	'BS',	0,	17),
(17,	'Bouvet Island',	'BV',	0,	18),
(18,	'Belarus',	'BY',	0,	19),
(19,	'Canada',	'CA',	0,	20),
(20,	'Cocos (Keeling) Islands',	'CC',	0,	10),
(21,	'Cook Islands',	'CK',	0,	21),
(22,	'China',	'CN',	0,	22),
(23,	'Costa Rica',	'CR',	0,	23),
(24,	'Christmas Island',	'CX',	0,	10),
(25,	'Cyprus',	'CY',	0,	1),
(26,	'Czech Republic',	'CZ',	0,	24),
(27,	'Germany',	'DE',	1,	1),
(28,	'Denmark',	'DK',	0,	25),
(29,	'Dominica',	'DM',	0,	7),
(30,	'Dominican Republic',	'DO',	0,	26),
(31,	'Ecuador',	'EC',	0,	9),
(32,	'Estonia',	'EE',	0,	27),
(33,	'Egypt',	'EG',	0,	28),
(34,	'Eritrea',	'ER',	0,	29),
(35,	'Micronesia, Federated States of',	'FM',	0,	9),
(36,	'Faroe Islands',	'FO',	0,	25),
(37,	'United Kingdom',	'GB',	0,	30),
(38,	'Grenada',	'GD',	0,	7),
(39,	'Georgia',	'GE',	0,	31),
(40,	'French Guiana',	'GF',	0,	1),
(41,	'Ghana',	'GH',	0,	32),
(42,	'Gibraltar',	'GI',	0,	33),
(43,	'Greenland',	'GL',	0,	25),
(44,	'Guadeloupe',	'GP',	0,	1),
(45,	'Guatemala',	'GT',	0,	34),
(46,	'Guam',	'GU',	0,	9),
(47,	'Hong Kong',	'HK',	0,	35),
(48,	'Heard Island and McDonald Islands',	'HM',	0,	10),
(49,	'Honduras',	'HN',	0,	36),
(50,	'Croatia',	'HR',	0,	37),
(51,	'Haiti',	'HT',	0,	9),
(52,	'Hungary',	'HU',	0,	38),
(53,	'Indonesia',	'ID',	0,	39),
(54,	'Israel',	'IL',	0,	40),
(55,	'India',	'IN',	0,	41),
(56,	'British Indian Ocean Territory',	'IO',	0,	9),
(57,	'Jamaica',	'JM',	0,	42),
(58,	'Japan',	'JP',	0,	43),
(59,	'Kenya',	'KE',	0,	44),
(60,	'Cambodia',	'KH',	0,	45),
(61,	'Kiribati',	'KI',	0,	10),
(62,	'Saint Kitts and Nevis',	'KN',	0,	7),
(63,	'Korea, Democratic Peoples Republic of',	'KP',	0,	46),
(64,	'Korea, Republic of',	'KR',	0,	47),
(65,	'Kuwait',	'KW',	0,	48),
(66,	'Cayman Islands',	'KY',	0,	49),
(67,	'Kazakhstan',	'KZ',	0,	50),
(68,	'Lebanon',	'LB',	0,	51),
(69,	'Saint Lucia',	'LC',	0,	7),
(70,	'Liechtenstein',	'LI',	0,	52),
(71,	'Sri Lanka',	'LK',	0,	53),
(72,	'Lesotho',	'LS',	0,	54),
(73,	'Lithuania',	'LT',	0,	55),
(74,	'Latvia',	'LV',	0,	56),
(75,	'Montenegro',	'ME',	0,	1),
(76,	'Marshall Islands',	'MH',	0,	9),
(77,	'Macao',	'MO',	0,	57),
(78,	'Northern Mariana Islands',	'MP',	0,	9),
(79,	'Martinique',	'MQ',	0,	1),
(80,	'Montserrat',	'MS',	0,	7),
(81,	'Mauritius',	'MU',	0,	58),
(82,	'Malaysia',	'MY',	0,	59),
(83,	'Namibia',	'NA',	0,	54),
(84,	'Norfolk Island',	'NF',	0,	10),
(85,	'Nigeria',	'NG',	0,	60),
(86,	'Nicaragua',	'NI',	0,	61),
(87,	'Norway',	'NO',	0,	18),
(88,	'Nepal',	'NP',	0,	62),
(89,	'Nauru',	'NR',	0,	10),
(90,	'Niue',	'NU',	0,	21),
(91,	'New Zealand',	'NZ',	0,	21),
(92,	'Oman',	'OM',	0,	63),
(93,	'Panama',	'PA',	0,	9),
(94,	'Philippines',	'PH',	0,	64),
(95,	'Pakistan',	'PK',	0,	65),
(96,	'Saint Pierre and Miquelon',	'PM',	0,	1),
(97,	'Pitcairn',	'PN',	0,	21),
(98,	'Puerto Rico',	'PR',	0,	9),
(99,	'Palau',	'PW',	0,	9),
(100,	'Paraguay',	'PY',	0,	66),
(101,	'Qatar',	'QA',	0,	67),
(102,	'Réunion',	'RE',	0,	1),
(103,	'Russian Federation',	'RU',	0,	68),
(104,	'Saudi Arabia',	'SA',	0,	69),
(105,	'Seychelles',	'SC',	0,	70),
(106,	'Sweden',	'SE',	0,	71),
(107,	'Singapore',	'SG',	0,	72),
(108,	'Svalbard and Jan Mayen',	'SJ',	0,	18),
(109,	'San Marino',	'SM',	0,	1),
(110,	'El Salvador',	'SV',	0,	9),
(111,	'Turks and Caicos Islands',	'TC',	0,	9),
(112,	'French Southern Territories',	'TF',	0,	1),
(113,	'Thailand',	'TH',	0,	73),
(114,	'Tokelau',	'TK',	0,	21),
(115,	'Timor-Leste',	'TL',	0,	9),
(116,	'Trinidad and Tobago',	'TT',	0,	74),
(117,	'Tuvalu',	'TV',	0,	10),
(118,	'Taiwan, Province of China',	'TW',	0,	75),
(119,	'Tanzania, United Republic of',	'TZ',	0,	76),
(120,	'United States Minor Outlying Islands',	'UM',	0,	9),
(121,	'United States',	'US',	1,	77),
(122,	'Uzbekistan',	'UZ',	0,	78),
(123,	'Holy See (Vatican City State)',	'VA',	0,	1),
(124,	'Saint Vincent and the Grenadines',	'VC',	0,	7),
(125,	'Virgin Islands, British',	'VG',	0,	9),
(126,	'Virgin Islands, U.S.',	'VI',	0,	9),
(127,	'Mayotte',	'YT',	0,	1),
(128,	'Netherland',	'NL',	1,	1);
