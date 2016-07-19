-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 19 2016 г., 12:03
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `modul4`
--

-- --------------------------------------------------------

--
-- Структура таблицы `answer_coments`
--

CREATE TABLE IF NOT EXISTS `answer_coments` (
  `id_answer` int(3) NOT NULL AUTO_INCREMENT,
  `id_coments` int(3) NOT NULL,
  `content_answer` text NOT NULL,
  `id_user` int(3) NOT NULL,
  `data_answer` date NOT NULL,
  `id_news` int(3) NOT NULL,
  PRIMARY KEY (`id_answer`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `answer_coments`
--

INSERT INTO `answer_coments` (`id_answer`, `id_coments`, `content_answer`, `id_user`, `data_answer`, `id_news`) VALUES
(1, 8, 'Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры', 5, '2016-07-17', 15),
(2, 8, 'cыграют чистота природы, ценность достопримечательностей', 7, '2016-07-17', 15),
(3, 8, 'Cыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры', 6, '2016-07-17', 15);

-- --------------------------------------------------------

--
-- Структура таблицы `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id_banner` int(3) NOT NULL AUTO_INCREMENT,
  `name_banner` varchar(255) DEFAULT NULL,
  `company_banner` varchar(255) DEFAULT NULL,
  `site_banner` varchar(255) DEFAULT NULL,
  `price_banner` int(6) NOT NULL,
  `img_banner` varchar(255) NOT NULL,
  `position_banner` varchar(100) NOT NULL,
  `published_banner` int(1) NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `banners`
--

INSERT INTO `banners` (`id_banner`, `name_banner`, `company_banner`, `site_banner`, `price_banner`, `img_banner`, `position_banner`, `published_banner`) VALUES
(1, 'Отдых в Таиланде', 'trevel-tour', 'traveltour.com', 10000, '5.jpg', 'left', 0),
(2, 'Мороженное', 'Империя', 'http://rud.ua/ru/products/ice-cream/cone/', 20, '1.jpg', 'right', 1),
(3, 'Тапочки для кораллов и пляжа', 'Proswim', 'http://www.proswim.ru/catalog/prochee/obuv-/obuv-dlya-bassejna-i-plyazha/tapochki-dlya-korallov-i-plyazha/', 460, '2.jpg', 'right', 0),
(4, 'Купальник пуш ап', 'Womanadvice', 'http://womanadvice.ru/kupalnik-push-ap', 1200, '7.jpg', 'left', 1),
(5, 'Тапочки для купания Demix', 'Флиппер', 'http://otzovik.com/reviews/pvh_tapochki_dlya_kupaniya_demix_flipper/', 500, '8.jpg', 'left', 1),
(6, 'Аквапарк', 'Aquasferra', 'https://vk.com/aquasfera', 230, '3.jpg', 'right', 1),
(7, 'Акция', 'Горящий тур', 'http://www.hottour.com.ua/tours', 9899, '4.jpg', 'right', 1),
(8, 'Семейный отдых', 'Travel', 'http://www.travel.ru/', 15000, '6.jpg', 'left', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(2) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(100) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Отели'),
(2, 'Авио'),
(3, 'Туристические'),
(4, 'О компании');

-- --------------------------------------------------------

--
-- Структура таблицы `coments`
--

CREATE TABLE IF NOT EXISTS `coments` (
  `id_coments` int(3) NOT NULL AUTO_INCREMENT,
  `content_coments` text NOT NULL,
  `user_id` int(3) NOT NULL,
  `news_id` int(3) NOT NULL,
  `count_pluse` int(6) DEFAULT NULL,
  `count_minuse` int(6) DEFAULT NULL,
  `data_coment` date NOT NULL,
  PRIMARY KEY (`id_coments`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `coments`
--

INSERT INTO `coments` (`id_coments`, `content_coments`, `user_id`, `news_id`, `count_pluse`, `count_minuse`, `data_coment`) VALUES
(1, 'Это очень хорошая новость.', 4, 15, 15, NULL, '2016-07-14'),
(2, 'Да, Победителей определят в 5 регионах.', 6, 15, 18, NULL, '2016-06-23'),
(3, 'Да, Победителей определят в 5 регионах.', 9, 11, 10, 1, '2016-06-12'),
(4, 'Благодаря премии власти планируют популяризовать регионы и увеличить их доход от туризма.', 8, 17, 29, NULL, '2016-07-14'),
(5, 'Победителей объявят 24 мая, по итогам заключительного этапа конкурса', 5, 10, 16, NULL, '2016-06-25'),
(6, 'Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг', 5, 15, 17, NULL, '2016-06-24'),
(7, 'Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.', 7, 18, 11, NULL, '2016-07-14'),
(8, 'Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.', 6, 15, 20, NULL, '2016-06-22'),
(9, 'Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.', 7, 17, 19, NULL, '2016-07-14'),
(10, 'Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.', 5, 20, 21, NULL, '2016-07-14');

-- --------------------------------------------------------

--
-- Структура таблицы `design`
--

CREATE TABLE IF NOT EXISTS `design` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `color_head` varchar(100) DEFAULT NULL,
  `color_container` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `design`
--

INSERT INTO `design` (`id`, `color_head`, `color_container`) VALUES
(1, '', 'Azure');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id_image` int(10) NOT NULL AUTO_INCREMENT,
  `name_images` varchar(255) NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `id_category_menu` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `is_published` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `title`, `alias`, `id_category_menu`, `is_published`) VALUES
(1, 'Главная', 'pages', '1', 1),
(2, 'Новости', 'news', '2', 1),
(3, 'Категории', 'category', '3', 1),
(4, 'Админка', 'admin/news/', '4', 1),
(5, 'Too', 'too', '1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `data_news` date NOT NULL,
  `title_news` varchar(255) NOT NULL,
  `id_category` int(3) NOT NULL,
  `content_news` text NOT NULL,
  `img_news` varchar(255) DEFAULT NULL,
  `published_news` int(1) DEFAULT NULL,
  `alias_news` int(3) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id_news`, `data_news`, `title_news`, `id_category`, `content_news`, `img_news`, `published_news`, `alias_news`) VALUES
(1, '2014-01-04', 'Министерство туризма отметит лучшие курорты Таиланда', 2, '<p>Представители Министерства туризма Таиланда объявили о конкурсе на лучшие направления для путешествий, сообщает&nbsp;<a href="http://www.ttrweekly.com/site/2016/04/ministry-to-award-best-destinations/comment-page-1/">TRweekly</a>.</p>\r\n\r\n<p>Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.</p>\r\n\r\n<p>Благодаря премии власти планируют популяризовать регионы и увеличить их доход от туризма.</p>\r\n\r\n<p>Победителей объявят 24 мая, по итогам заключительного этапа конкурса.</p>\r\n', 'a671833bb23a0c625f2e221a5cd1fcc7.jpg', 1, 0),
(4, '2016-07-07', 'Два курорта Таиланда вошли в рейтинг красивейших мест Азии от Conde Nast Traveler', 3, '<p>Популярный туристический ресурс Conde Nast Traveler составил ТОП-50 красивых мест Азии по результатам голосования читателей. Отмечен был и Таиланд: в список вошли&nbsp;<a href="http://ru.sayamatravel.com/region/5/">остров Тао</a>&nbsp;на юге, любимый дайверами со всего мира, а также &laquo;северная столица&raquo; страны &mdash; древний город<a href="http://ru.sayamatravel.com/region/14/">Чиангмай</a>, богатый памятниками истории и культуры.</p>\r\n', 'shutterstock_401652001.jpg', 1, 0),
(14, '2016-07-07', 'Два курорта Таиланда вошли в рейтинг красивейших мест Азии от Conde Nast Traveler', 3, '<p>Популярный туристический ресурс Conde Nast Traveler составил ТОП-50 красивых мест Азии по результатам голосования читателей. Отмечен был и Таиланд: в список вошли&nbsp;<a href="http://ru.sayamatravel.com/region/5/">остров Тао</a>&nbsp;на юге, любимый дайверами со всего мира, а также &laquo;северная столица&raquo; страны &mdash; древний город<a href="http://ru.sayamatravel.com/region/14/">Чиангмай</a>, богатый памятниками истории и культуры.</p>\r\n', 'shutterstock_401652001.jpg', 1, 0),
(15, '2016-01-04', 'Министерство туризма отметит лучшие курорты Таиланда', 1, '<p>Представители Министерства туризма Таиланда объявили о конкурсе на лучшие направления для путешествий, сообщает&nbsp;<a href="http://www.ttrweekly.com/site/2016/04/ministry-to-award-best-destinations/comment-page-1/">TRweekly</a>.</p>\r\n\r\n<p>Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.</p>\r\n\r\n<p>Благодаря премии власти планируют популяризовать регионы и увеличить их доход от туризма.</p>\r\n\r\n<p>Победителей объявят 24 мая, по итогам заключительного этапа конкурса.</p>\r\n', '5.jpg', 1, 0),
(16, '2016-07-07', 'Два курорта Таиланда вошли в рейтинг красивейших мест Азии от Conde Nast Traveler', 1, '<p>Популярный туристический ресурс Conde Nast Traveler составил ТОП-50 красивых мест Азии по результатам голосования читателей. Отмечен был и Таиланд: в список вошли&nbsp;<a href="http://ru.sayamatravel.com/region/5/">остров Тао</a>&nbsp;на юге, любимый дайверами со всего мира, а также &laquo;северная столица&raquo; страны &mdash; древний город<a href="http://ru.sayamatravel.com/region/14/">Чиангмай</a>, богатый памятниками истории и культуры.</p>\r\n', 'shutterstock_401652001.jpg', 1, 0),
(17, '2016-06-24', ' Безопасность тайских авиалиний доказана специалистами', 2, '<p>Как сообщает&nbsp;<a href="http://news.thaivisa.com/thailand/thai-airlines-excluded-from-easa-blacklist/146695/">Thai Visa News</a>, ни один авиаперевозчик Таиланда не попал в &laquo;черный список&raquo;&nbsp;Европейского агентства по безопасности перелетов EASA:&nbsp;все компании успешно прошли тесты.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Тем не менее, Таиланд намерен приложить максимум усилий для обеспечения еще большего комфорта и безопасности каждого авиапассажира, заявил министр транспорта страны.</p>\r\n', '1d205c6601fbd540f86220e4b970ba4b.jpg', 1, 0),
(18, '2016-09-14', 'Тайский остров попал в десятку лучших на планете', 3, '<p>Остров Пхукет занял 8-е место в ТОП-10 островов мира для отдыха по версии портала&nbsp;<a href="https://www.tripadvisor.ru/TravelersChoice-Islands">TripAdvisor</a>. Рейтинг составлялся по результатам отзывов туристов.</p>\r\n\r\n<p>Первые 3 позиции завоевали острова Мауи (Гавайи, США), Санторини (Греция) и Ямайка.</p>\r\n', 'a671833bb23a0c625f2e221a5cd1fcc7.jpg', 1, 0),
(19, '2016-01-04', 'Министерство туризма отметит лучшие курорты Таиланда', 1, '<p>Представители Министерства туризма Таиланда объявили о конкурсе на лучшие направления для путешествий, сообщает&nbsp;<a href="http://www.ttrweekly.com/site/2016/04/ministry-to-award-best-destinations/comment-page-1/">TRweekly</a>.</p>\r\n\r\n<p>Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.</p>\r\n\r\n<p>Благодаря премии власти планируют популяризовать регионы и увеличить их доход от туризма.</p>\r\n\r\n<p>Победителей объявят 24 мая, по итогам заключительного этапа конкурса.</p>\r\n', '032fa5a92f8c6d1ac2f70f2720ce6b31.jpg', 1, 0),
(20, '2016-07-07', 'Два курорта Таиланда вошли в рейтинг красивейших мест Азии от Conde Nast Traveler', 1, '<p>Популярный туристический ресурс Conde Nast Traveler составил ТОП-50 красивых мест Азии по результатам голосования читателей. Отмечен был и Таиланд: в список вошли&nbsp;<a href="http://ru.sayamatravel.com/region/5/">остров Тао</a>&nbsp;на юге, любимый дайверами со всего мира, а также &laquo;северная столица&raquo; страны &mdash; древний город<a href="http://ru.sayamatravel.com/region/14/">Чиангмай</a>, богатый памятниками истории и культуры.</p>\r\n', '90988e7a67a206040fa8809971ee2bf0.jpg', 1, 0),
(21, '2016-01-02', ' Добираться из Владивостока в Таиланд станет легче', 2, '<p>С 9 октября 2016 года авиакомпания S7 Airlines запускает еженедельный рейс &laquo;Бангкок &mdash; Владивосток&raquo; на Boeing-767. Вылеты из Владивостока планируются каждый понедельник, а из<a href="http://ru.sayamatravel.com/region/16/">Бангкока</a>&nbsp;― по воскресеньям.</p>\r\n\r\n<p>Сейчас авиаперевозчик предлагает прямые регулярные рейсы в столицу Таиланда из Новосибирска, Иркутска и Красноярска.</p>\r\n\r\n<p>Билеты уже можно купить на&nbsp;<a href="http://www.s7.ru/home/about/homepage.dot">официальном сайте</a>, а также во всех офисах продаж.</p>\r\n\r\n<p>Российская компания S7 Airlines использует последние достижения отрасли для обслуживания пассажиров и владеет современным парком воздушных судов: Airbus, Boeing и др.</p>\r\n', 'e5b7247c1336c8a2067d9e8d3585d59c.jpg', 1, 0),
(22, '2016-01-02', 'Министерство туризма отметит лучшие курорты Таиланда', 2, '<p>Представители Министерства туризма Таиланда объявили о конкурсе на лучшие направления для путешествий, сообщает&nbsp;<a href="http://www.ttrweekly.com/site/2016/04/ministry-to-award-best-destinations/comment-page-1/">TRweekly</a>.</p>\r\n\r\n<p>Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.</p>\r\n\r\n<p>Благодаря премии власти планируют популяризовать регионы и увеличить их доход от туризма.</p>\r\n\r\n<p>Победителей объявят 24 мая, по итогам заключительного этапа конкурса.</p>\r\n', '29c0a08145e2276a7cacfc621f774866.jpg', 1, 0),
(23, '2015-01-04', 'Министерство туризма отметит лучшие курорты Таиланда', 2, '<p>Представители Министерства туризма Таиланда объявили о конкурсе на лучшие направления для путешествий, сообщает&nbsp;<a href="http://www.ttrweekly.com/site/2016/04/ministry-to-award-best-destinations/comment-page-1/">TRweekly</a>.</p>\r\n\r\n<p>Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.</p>\r\n\r\n<p>Благодаря премии власти планируют популяризовать регионы и увеличить их доход от туризма.</p>\r\n\r\n<p>Победителей объявят 24 мая, по итогам заключительного этапа конкурса.</p>\r\n', 'a671833bb23a0c625f2e221a5cd1fcc7.jpg', 1, 0),
(24, '2016-08-19', 'SAYAMA Travel Group приглашает на работу отельных гидов', 4, '<p>Компания SAYAMA Travel ищет специалистов на должность отельного гида в Таиланде и Украине. Среди преимуществ работы: динамично развивающаяся международная фирма, дружный коллектив, широкие возможности для профессионального и личностного роста. От претендента требуется опыт работы, знание английского и русского языка.</p>\r\n\r\n<p>Узнать остальные подробности о вакансии, а также адрес для отправки резюме можно по&nbsp;<a href="http://ru.sayamatravel.com/careers">этой ссылке</a>.</p>\r\n', '340f623f7d66e172322ec43a3a8828cc.jpg', 1, 0),
(25, '2016-03-10', 'В отеле Six Senses Samui проходит акция «Бесплатные ночи»', 1, '<p>Отель&nbsp;<a href="http://ru.sayamatravel.com/hotel/231/six-senses-%20samui">Six Senses</a>&nbsp;на острове Самуи запускает специальное предложение для проживающих в летне-осенний период. При бронировании номеров до 31 октября 2016 года действует акция &laquo;Бесплатные ночи&raquo;:</p>\r\n\r\n<ul>\r\n	<li>плати за 4 ночи &mdash; живи 5;</li>\r\n	<li>плати за 5 ночей &mdash; живи 7.</li>\r\n</ul>\r\n\r\n<p>Подробные условия акции, а также отельные тарифы вы можете узнать у менеджеров компании&nbsp;<a href="http://ru.sayamatravel.com/contacts">SAYAMA Travel</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '29c0a08145e2276a7cacfc621f774866.jpg', 1, 0),
(26, '2016-06-08', ' В Таиланде пройдет Amazing Thailand Grand Sale', 3, '<p>В 2016 году Традиционный фестиваль шоппинга в Таиланде продлится с 15 июня по 15 августа, сообщает Туристическое управление Таиланда. Amazing Thailand Grand Sale пройдет в туристических курортах Королевства в торговых центрах и местных лавках. Туристов ожидают грандиозные скидки на ювелирные изделия, сувениры, одежду и многое другое. Снижение цены на товары от 10 до 80%.</p>\r\n', 'a083749e30533f9176a3c71612b83d26.jpg', 1, 0),
(27, '2016-01-04', 'Министерство туризма отметит лучшие курорты Таиланда', 1, '<p>Представители Министерства туризма Таиланда объявили о конкурсе на лучшие направления для путешествий, сообщает&nbsp;<a href="http://www.ttrweekly.com/site/2016/04/ministry-to-award-best-destinations/comment-page-1/">TRweekly</a>.</p>\r\n\r\n<p>Победителей определят в 5 регионах: Исан, южные провинции, районы для пляжного отдыха, Королевское побережье и Андаманские острова. Ключевую роль сыграют чистота природы, ценность достопримечательностей, развитость искусства и культуры, сохранность традиционного уклада жизни, а также качество туристических услуг.</p>\r\n\r\n<p>Благодаря премии власти планируют популяризовать регионы и увеличить их доход от туризма.</p>\r\n\r\n<p>Победителей объявят 24 мая, по итогам заключительного этапа конкурса.</p>\r\n', '032fa5a92f8c6d1ac2f70f2720ce6b31.jpg', 1, 0),
(28, '2016-01-04', ' Специальное летнее предложение от компании SAYAMA Travel', 1, '<p>Компания SAYAMA Travel рада представить вам специальное летнее предложение. При проживании от 3 ночей в определенных гостиницах категорий 3&ndash;4* турист получит групповой трансфер и экскурсию в подарок. А при проживании от 3 ночей в определенных гостиницах категории 5* ― в подарок индивидуальный трансфер и экскурсия.</p>\r\n\r\n<p>Узнать, какие отели участвуют в акции, вы можете, написав нам на почту:&nbsp;<a href="mailto:info@sayamatravel.com">info@sayamatravel.com</a>.</p>\r\n\r\n<p>Количество акционных номеров ограничено! Проверяйте наличие с нашими менеджерами.</p>\r\n', '568de48bfe20104ee6ecbfb8ee37f529.jpg', 1, 0),
(29, '2016-07-14', 'Власти Таиланда познакомят туристов с преимуществами тайского шелка', 3, '<p>Туристическое управление Таиланда запустило новую кампанию по продвижению тайского шелка на мировом рынке. Гости страны смогут увидеть весь процесс производства и посетить выставку легендарной ткани в торговом центре Siam Paragon.</p>\r\n\r\n<p>Акция приурочена к 84-летию ее Величества Королевы Таиланда Сирикит ― зачинательницы моды на местный шелк во всем мире.</p>\r\n', '568de48bfe20104ee6ecbfb8ee37f529.jpg', 1, 0),
(30, '2016-07-12', 'Добираться из Владивостока в Таиланд станет легче', 0, '<p>С 9 октября 2016 года авиакомпания S7 Airlines запускает еженедельный рейс &laquo;Бангкок &mdash; Владивосток&raquo; на Boeing-767. Вылеты из Владивостока планируются каждый понедельник, а из<a href="http://ru.sayamatravel.com/region/16/">Бангкока</a>&nbsp;― по воскресеньям.</p>\r\n\r\n<p>Сейчас авиаперевозчик предлагает прямые регулярные рейсы в столицу Таиланда из Новосибирска, Иркутска и Красноярска.</p>\r\n\r\n<p>Билеты уже можно купить на&nbsp;<a href="http://www.s7.ru/home/about/homepage.dot">официальном сайте</a>, а также во всех офисах продаж.</p>\r\n\r\n<p>Российская компания S7 Airlines использует последние достижения отрасли для обслуживания пассажиров и владеет современным парком воздушных судов: Airbus, Boeing и др.</p>\r\n', 'e5b7247c1336c8a2067d9e8d3585d59c.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `is_active`, `role`) VALUES
(5, 'admin', 'da9f7470a5236ae0e1c709ae47e702e0', 1, 'admin'),
(6, 'root', '63a9f0ea7b', 1, 'editor'),
(7, 'Olya', 'b0609dcb1f', 0, NULL),
(8, 'Kolya', 'kolya', 0, NULL),
(9, 'Olya', 'b0609dcb1f', 0, NULL),
(10, 'Kolya', 'ec3da25081', 0, NULL),
(11, 'Olya', 'b0609dcb1f', 0, NULL),
(12, 'Kolya', 'ec3da25081', 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;