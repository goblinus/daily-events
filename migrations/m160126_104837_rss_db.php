<?php

use yii\db\Migration;
use yii\db\Schema;
class m160126_104837_rss_db extends Migration
{
    public function up()
    {
        //////////////////////////////CREATE TABLES /////////////////////////////

        $this->createTableEvents();
        $this->insertDataIntoEvents();

        $this->createTableSources();
        $this->insertDataIntoSources();

        $this->createTableChannels();
        $this->insertDataIntoChannels();

    }

    public function down()
    {
        $this->execute('DROP TABLE IF EXISTS `texts`');
        $this->execute('DROP TABLE IF EXISTS `channels`');
        $this->execute('DROP TABLE IF EXISTS `sources`');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */


    protected function createTableEvents()
    {
        $this->execute("DROP TABLE IF EXISTS events");
        $this->execute("
            CREATE TABLE events (
                event_id 	INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
                title		VARCHAR(999) NOT  NULL,
                created_at	DATETIME NOT NULL,
                updated_at  DATETIME NOT NULL DEFAULT NOW(),
                description	TEXT,
                info        TEXT,
                PRIMARY KEY(event_id)
            ) ENGINE=InnoDB DEFAULT CHARSET = 'utf8' COLLATE utf8_general_ci
        ");
    }

    protected function createTableSources()
    {
        $this->execute("DROP TABLE IF EXISTS sources");
        $this->execute("
            CREATE TABLE sources (
                source_id   INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
                title       VARCHAR(999) NOT NULL,
                uri         VARCHAR(999) NOT NULL,
                PRIMARY KEY(source_id)
            ) ENGINE=InnoDB DEFAULT CHARSET = 'utf8' COLLATE utf8_general_ci
        ");
    }

    protected function insertDataIntoEvents()
    {
        $this->batchInsert('events', ['title', 'created_at', 'description', 'info'], [
            ['Заседание Совета директоров Банка России', '2016-01-29 12:00:00', 'Принято решение о сохранении ключевой ставке в размере 11% годовых. В связи со снижением мировых цен на нефть заявлено о высокой вероятности увеличения уровня инфляции в России и об ужесточения денежно-кредитной политики ЦБ РФ в этой связи', ''],
            ['Заседание Правительства РФ', '2016-01-21 12:00:00', 'Принято решение о продлении бесплатной приватизации жилья для граждан РФ сроком до 1 марта 2017 года', 'В настоящее время в государственной собственности находится 20% жилого фонда'],
        ]);
    }

    protected function insertDataIntoSources()
    {
        $this->batchInsert('sources', ['source_id', 'title', 'uri'], [
            [1,'Портал BFM.ru','http://www.bfm.ru/'],
            [2,'Газета \"Ведомости\"','http://www.vedomosti.ru/'],
            [3,'Информационно-аналитический портал RBC.ru','http://www.rbc.ru/'],
            [4,'Новости IT индустрии CNEWS.ru','http://www.cnews.ru/'],
            [5,'Финансовый портал QUOTE.ru','http://quote.rbc.ru/shares/'],
            [6,'Деловая газета \"RBC daily\"','http://www.rbcdaily.ru/'],
            [7,'Деловая газета \"Взгляд\"','http://www.vz.ru/'],
            [8,'Pravda.ru','http://www.pravda.ru/'],
            [9,'Комсомольская правда','http://www.kp.ru/'],
            [10,'Московский комсомолец','http://www.mk.ru/'],
            [11,'Аргументы и факты','http://www.aif.ru/'],
            [12,'Lenta.ru','http://lenta.ru/'],
            [13,'Деловой Петербург','http://www.dp.ru/'],
            [14,'Regions.ru','http://regions.ru/'],
            [15,'Агентство национальных новостей \"ANN news\"','http://www.annews.ru/'],
            [16,'Деловая электронная газета Татарстана \"Бизнес-онлайн\"','http://www.business-gazeta.ru/'],
            [17,'Газета.ру','http://www.gazeta.ru/'],
            [18,'Лента новостей ЮГА.ру','http://www.yuga.ru/'],
            [19,'Рейтинг новостей TopNews',' http://www.topnews.ru/'],
            [20,'Крымская служба новостей \"Новости Крыма\"','http://allcrimea.net/'],
            [21,'Агентство новостей Chelyabinsk.ru','http://chelyabinsk.ru/text/rss.xml'],
            [22,'Санкт-Петербург.ру','http://saint-petersburg.ru/'],
            [23,'Информационный портал \"В Москве\"','http://www.newsmsk.com/'],
            [24,'Новости Краснодара и Краснодарского края \"Югополис\"','http://www.yugopolis.ru/'],
            [25,'Информационно-аналитический портал \"АПИ Урал\"','http://www.apiural.ru/'],
            [26,'Клопс.ру','http://klops.ru/'],
            [27,'Агентство бизнес новостей','http://abnews.ru/'],
            [28,'Новости Владивостока и Приморского края Vl.ru','http://www.newsvl.ru/rss'],
            [29,'Агентство новостей Подмосковья','http://www.mosoblpress.ru/'],
            [30,'Новости Тольятти Tlt.ru','http://tlt.ru/'],
            [31,'Новости ИА \"Телеинформ\", г. Иркутск','http://i38.ru/'],
            [32,'Агентство ТВ-2','http://www.tv2.tomsk.ru/'],
            [33,'Томский обзор','http://obzor.westsib.ru/'],
            [34,'Ваши новости','http://vnnews.ru/'],
            [35,'Газета \"Известия\"','http://izvestia.ru/'],
            [36,'Деловая газета. Юг','http://www.dg-yug.ru/'],
            [37,'Забайкальский край. Официальный портал','http://www.xn--80aaaac8algcbgbck3fl0q.xn--p1ai/'],
            [38,'Заря Кубани. Оперативные новости города и района','http://zaryakubani.ru/'],
            [39,'Интернет-сайт лесосибирской городской газеты \"ЗаряЕнисея.РФ\"','http://zaren.ru/'],
            [40,'Зеркало недели. Украина','http://zn.ua/'],
            [41,'Комионлайн. Информационный портал','http://komionline.ru/'],
            [42,'Коммерсант.ру','http://www.kommersant.ru/'],
            [43,'Нато.РФ. Информационно-аналитический портал','http://xn--80azep.xn--p1ai/'],
            [44,'Орел. Регион','http://xn----ftbebqosbgnd.xn--p1ai/'],
            [45,'Открытое Информационное Агентство','http://openinform.ru/'],
            [46,'Геленджикская газета \"Прибой\"','http://gelpriboy.ru/'],
            [47,'Радио \"Дорожное-FM. Южный регион\"','http://xn--80agcq4ai6h.xn--p1ai/index.php'],
            [48,'RG.RU: Российская газета','http://www.rg.ru/'],
            [49,'Росбалт. Информационное агентство','http://www.rosbalt.ru/'],
            [50,'РСПП. Российский Союз Промышленников и Предпринимателей. Официальный сайт','http://xn--o1aabe.xn--p1ai/'],
            [51,'Санкт-Петербургские Ведомости. Главная городская газета','http://spbvedomosti.ru/'],
            [52,'Алтапресс.ру','http://altapress.ru/'],
            [53,'Секрет фирмы','http://secretmag.ru/'],
            [54,'Моя слобода. Семейная газета родного города','http://myslo.ru/pressa/gazeta_sloboda'],
            [55,'Тамань. Газета Темрюкского района','http://www.tamannews.ru/'],
            [56,'Федеральная Таможенная Служба. Официальный сайт','http://www.customs.ru/'],
            [57,'Труд.ру. Общественно-политическоен издание','http://www.trud.ru/'],
            [58,'Утро Петербурга','http://www.utrospb.ru/'],
            [59,'Фонд Стратегической Культуры. Электронное издание','http://www.fondsk.ru/'],
            [60,'Vesti.lv','http://vesti.lv/'],
            [61,'УЛПРЕССА. Ульяновск','http://ulpressa.ru/'],
            [62,'Чита.ру. Городской портал','http://www.chita.ru/'],
            [63,'Экономические Известия','http://eizvestia.com/'],
            [64,'Эхо в Санкт-Петербурге','http://echospb.ru/'],
            [65,'Двина. Издательский дом','http://www.dvina29.ru/'],
            [66,'Военное-промышленный курьер. Общероссийская еженедельная газета','http://www.vpk-news.ru/'],
            [67,'Краснодарский край. Общественно-политическое издание','http://www.krasnodar-region.com/'],
            [68,'The Washington Free Beacon','http://freebeacon.com/'],
            [69,'Fox News','http://www.foxnews.com/'],
            [70,'The Huffington Post','http://www.huffingtonpost.com/'],
            [71,'The Washington Post','https://www.washingtonpost.com/'],
            [72,'The Guardian','http://www.theguardian.com/'],
            [73,'The BBC News','http://feeds.bbci.co.uk/news/'],
            [74,'The Wall Street Journal','http://www.wsj.com/'],
            [75,'The Reuters','http://www.reuters.com/'],
            [76,'ABC News','http://abcnews.com/'],
            [77,'Time','http://time.com/'],
            [78,'CBC News','http://www.cbsnews.com/'],
        ]);
    }


    protected function createTableChannels()
    {
        $this->execute("
            CREATE TABLE channels (
                channel_id  INT(11) NOT NULL UNIQUE AUTO_INCREMENT,
                source_id   INT(11) NOT NULL,
                last_hash   VARCHAR(999),
                updated_at  DATETIME,
                update_at   DATETIME,
                processed   TINYINT(1) NOT NULL DEFAULT 0,
                uri         VARCHAR(999) NOT NULL,
                PRIMARY KEY(channel_id),
                FOREIGN KEY(source_id) REFERENCES sources(source_id) ON DELETE CASCADE
            ) ENGINE=InnoDB DEFAULT CHARSET = 'utf8' COLLATE utf8_general_ci
        ");
    }


    protected function insertDataIntoChannels()
    {
        $this->batchInsert('channels', ['channel_id', 'source_id', 'last_hash', 'updated_at', 'update_at', 'processed', 'uri'], [
            [1,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=20'],
            [2,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?rubric=19'],
            [3,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=21'],
            [4,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=22'],
            [5,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=23'],
            [6,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=24'],
            [7,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=25'],
            [8,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=26'],
            [9,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?tag=27'],
            [10,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?rubric=28'],
            [11,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?rubric=35'],
            [12,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?rubric=4016'],
            [13,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?rubric=7002'],
            [14,1,NULL,NULL,NULL,0,'http://www.bfm.ru/news.rss?type=news'],
            [15,2,NULL,NULL,NULL,0,'http://www.vedomosti.ru/newsline/out/rss.xml'],
            [16,2,NULL,NULL,NULL,0,'http://www.vedomosti.ru/rss/themes/politics.xml'],
            [17,2,NULL,NULL,NULL,0,'http://www.vedomosti.ru/rss/themes/companies.xml'],
            [18,2,NULL,NULL,NULL,0,'http://www.vedomosti.ru/rss/themes/finance.xml'],
            [19,2,NULL,NULL,NULL,0,'http://www.vedomosti.ru/rss/themes/tech.xml'],
            [20,2,NULL,NULL,NULL,0,'http://www.vedomosti.ru/rss/themes/realty.xml'],
            [21,3,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbc.ru/mainnews.rss'],
            [22,3,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbc.ru/politics.rss'],
            [23,3,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbc.ru/economics.rss'],
            [24,4,NULL,NULL,NULL,0,'http://www.cnews.ru/news_line.xml'],
            [25,4,NULL,NULL,NULL,0,'http://www.cnews.ru/inc/rss/articles_rss.xml'],
            [26,4,NULL,NULL,NULL,0,'http://club.cnews.ru/rss.php'],
            [27,4,NULL,NULL,NULL,0,'http://www.cnews.ru/inc/rss/telecom_rss.xml'],
            [28,4,NULL,NULL,NULL,0,'http://www.cnews.ru/inc/rss/internet_rss.xml'],
            [29,5,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/quote.ru/mainnews.rss'],
            [30,5,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/quote.ru/events.rss'],
            [31,5,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/quote.ru/merge.rss'],
            [32,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/mainnews.rss'],
            [33,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/focus_news.rss'],
            [34,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/tek_news.rss'],
            [35,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/potreb_news.rss'],
            [36,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/finance_news.rss'],
            [37,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/industry_news.rss'],
            [38,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/telecom_news.rss'],
            [39,6,NULL,NULL,NULL,0,'http://static.feed.rbc.ru/rbc/internal/rss.rbc.ru/rbcdaily.ru/last.rss'],
            [40,7,NULL,NULL,NULL,0,'http://www.vz.ru/rss.xml'],
            [41,8,NULL,NULL,NULL,0,'http://www.pravda.ru/world/export.xml'],
            [42,8,NULL,NULL,NULL,0,'http://www.pravda.ru/society/export.xml'],
            [43,8,NULL,NULL,NULL,0,'http://www.pravda.ru/economics/export.xml'],
            [44,8,NULL,NULL,NULL,0,'http://www.pravda.ru/science/export.xml'],
            [45,8,NULL,NULL,NULL,0,'http://www.bigness.ru/rss'],
            [46,8,NULL,NULL,NULL,0,'http://www.pravda.ru/districts/export.xml'],
            [47,8,NULL,NULL,NULL,0,'http://www.pravda.ru/science/export.xml'],
            [48,9,NULL,NULL,NULL,0,'http://www.kp.ru/rss/msk-politics.xml'],
            [49,9,NULL,NULL,NULL,0,'http://www.kp.ru/rss/msk-economics.xml'],
            [50,9,NULL,NULL,NULL,0,'http://www.kp.ru/rss/msk-incedent.xml'],
            [51,9,NULL,NULL,NULL,0,'http://www.kp.ru/rss/msk-life.xml'],
            [52,9,NULL,NULL,NULL,0,'http://www.kp.ru/rss/msk-science.xml'],
            [53,10,NULL,NULL,NULL,0,'http://www.mk.ru/rss/daily/index.xml'],
            [54,10,NULL,NULL,NULL,0,'http://www.mk.ru/rss/economics/index.xml'],
            [55,10,NULL,NULL,NULL,0,'http://www.mk.ru/rss/politics/index.xml'],
            [56,10,NULL,NULL,NULL,0,'http://www.mk.ru/rss/incident/index.xml'],
            [57,10,NULL,NULL,NULL,0,'http://www.mk.ru/rss/social/index.xml'],
            [58,10,NULL,NULL,NULL,0,'http://www.mk.ru/rss/science/index.xml'],
            [59,11,NULL,NULL,NULL,0,'http://www.aif.ru/rss/all.php'],
            [60,12,NULL,NULL,NULL,0,'http://lenta.ru/rss'],
            [61,13,NULL,NULL,NULL,0,'http://www.dp.ru/rss/'],
            [62,14,NULL,NULL,NULL,0,'http://regions.ru/export/Politika.xml'],
            [63,14,NULL,NULL,NULL,0,'http://regions.ru/export/Ekonomika.xml'],
            [64,14,NULL,NULL,NULL,0,'http://regions.ru/export/Obshestvo.xml'],
            [65,15,NULL,NULL,NULL,0,'http://www.annews.ru/rss.php'],
            [66,16,NULL,NULL,NULL,0,'http://www.business-gazeta.ru/rss.xml'],
            [67,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/lenta.xml'],
            [68,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/politics.xml'],
            [69,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/busnews.xml'],
            [70,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/business.xml'],
            [71,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/social.xml'],
            [72,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/social_more.xml'],
            [73,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/tech_articles.xml'],
            [74,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/tech_news.xml'],
            [75,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/comments.xml'],
            [76,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/science.xml'],
            [77,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/science_more.xml'],
            [78,17,NULL,NULL,NULL,0,'http://www.gazeta.ru/export/rss/kolonka.xml'],
            [79,18,NULL,NULL,NULL,0,'http://www.yuga.ru/news.rss'],
            [80,18,NULL,NULL,NULL,0,'http://www.yuga.ru/abkhazia.rss'],
            [81,18,NULL,NULL,NULL,0,'http://www.yuga.ru/adygea.rss'],
            [82,18,NULL,NULL,NULL,0,'http://www.yuga.ru/dagestan.rss'],
            [83,18,NULL,NULL,NULL,0,'http://www.yuga.ru/ingushetia.rss'],
            [84,18,NULL,NULL,NULL,0,'http://www.yuga.ru/kbr.rss'],
            [85,18,NULL,NULL,NULL,0,'http://www.yuga.ru/kcr.rss'],
            [86,18,NULL,NULL,NULL,0,'http://www.yuga.ru/kuban.rss'],
            [87,18,NULL,NULL,NULL,0,'http://www.yuga.ru/rostov.rss'],
            [88,18,NULL,NULL,NULL,0,'http://www.yuga.ru/stavropol.rss'],
            [89,18,NULL,NULL,NULL,0,'http://www.yuga.ru/chechnya.rss'],
            [90,18,NULL,NULL,NULL,0,'http://www.yuga.ru/y_osetia.rss'],
            [91,18,NULL,NULL,NULL,0,'http://www.yuga.ru/federal.rss'],
            [92,18,NULL,NULL,NULL,0,'http://www.yuga.ru/vmire.rss'],
            [93,18,NULL,NULL,NULL,0,'http://www.yuga.ru/fbphoto.rss'],
            [94,18,NULL,NULL,NULL,0,'http://www.yuga.ru/publish.rss'],
            [95,19,NULL,NULL,NULL,0,'http://www.topnews.ru/rss/rss.xml'],
            [96,20,NULL,NULL,NULL,0,'http://allcrimea.net/news/rss.xml'],
            [97,21,NULL,NULL,NULL,0,'http://chelyabinsk.ru/text/rss.xml'],
            [98,22,NULL,NULL,NULL,0,'http://saint-petersburg.ru/rss/spbru.rss'],
            [99,23,NULL,NULL,NULL,0,'http://www.newsmsk.com/rss/'],
            [100,24,NULL,NULL,NULL,0,'http://feeds.feedburner.com/yugopolis/vrWK'],
            [101,25,NULL,NULL,NULL,0,'http://www.apiural.ru/rss/'],
            [102,26,NULL,NULL,NULL,0,'http://klops.ru/rss.rss'],
            [103,26,NULL,NULL,NULL,0,'http://klops.ru/news.rss'],
            [104,26,NULL,NULL,NULL,0,'http://klops.ru/interview.rss'],
            [105,27,NULL,NULL,NULL,0,'http://abnews.ru/feed/'],
            [106,28,NULL,NULL,NULL,0,'http://www.newsvl.ru/rss'],
            [107,29,NULL,NULL,NULL,0,'http://www.mosoblpress.ru/rss/'],
            [108,30,NULL,NULL,NULL,0,'http://tlt.ru/rss/index.rss'],
            [109,31,NULL,NULL,NULL,0,'http://i38.ru/index.php?option=com_rd_rss&id=2'],
            [110,31,NULL,NULL,NULL,0,'http://i38.ru/index.php?option=com_rd_rss&id=4'],
            [111,31,NULL,NULL,NULL,0,'http://i38.ru/index.php?option=com_rd_rss&id=3'],
            [112,31,NULL,NULL,NULL,0,'http://i38.ru/index.php?option=com_rd_rss&id=5'],
            [113,31,NULL,NULL,NULL,0,'http://i38.ru/index.php?option=com_rd_rss&id=6'],
            [114,32,NULL,NULL,NULL,0,'http://www.tv2.tomsk.ru/'],
            [115,33,NULL,NULL,NULL,0,'http://obzor.westsib.ru/rss/all.xml'],
            [116,34,NULL,NULL,NULL,0,'http://vnnews.ru/rss.html?format=feed'],
            [117,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/politics.xml'],
            [118,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/38.xml'],
            [119,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/society.xml'],
            [120,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/economics.xml'],
            [121,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/69.xml'],
            [122,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/35.xml'],
            [123,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/36.xml'],
            [124,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/moscow.xml'],
            [125,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/scince.xml'],
            [126,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/gadgets.xml'],
            [127,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/37.xml'],
            [128,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/culture.xml'],
            [129,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/39.xml'],
            [130,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/buisines.xml'],
            [131,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/45.xml'],
            [132,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/46.xml'],
            [133,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/47.xml'],
            [134,35,NULL,NULL,NULL,0,'http://izvestia.ru/xml/rss/76.xml'],
            [135,36,NULL,NULL,NULL,0,'http://www.dg-yug.ru/yandexexpkrasnodar.xml'],
            [136,37,NULL,NULL,NULL,0,'http://www.xn--80aaaac8algcbgbck3fl0q.xn--p1ai/rss.xml'],
            [137,38,NULL,NULL,NULL,0,'http://zaryakubani.ru/rss.rss'],
            [138,39,NULL,NULL,NULL,0,'http://zaren.ru/feed/'],
            [139,40,NULL,NULL,NULL,0,'http://zn.ua/rss'],
            [140,41,NULL,NULL,NULL,0,'http://komionline.ru/rss/'],
            [141,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/weekly.xml'],
            [142,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/money.xml'],
            [143,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/sf.xml'],
            [144,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/radio.xml'],
            [145,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/corp.xml'],
            [146,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/section-politics.xml'],
            [147,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/section-economics.xml'],
            [148,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/section-business.xml'],
            [149,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/section-world.xml'],
            [150,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/section-accidents.xml'],
            [151,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/section-society.xml'],
            [152,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/RSS/section-culture.xml'],
            [153,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/piter.xml'],
            [154,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/vladivostok.xml'],
            [155,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/volgograd.xml'],
            [156,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/vrn.xml'],
            [157,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/ekaterinburg.xml'],
            [158,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/irkutsk.xml'],
            [159,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/kazan.xml'],
            [160,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/krasnoyarsk.xml'],
            [161,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/nnov.xml'],
            [162,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/novosibirsk.xml'],
            [163,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/omsk.xml'],
            [164,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/perm.xml'],
            [165,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/rostov.xml'],
            [166,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/samara.xml'],
            [167,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/saratov.xml'],
            [168,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/ufa.xml'],
            [169,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/khabarovsk.xml'],
            [170,42,NULL,NULL,NULL,0,'http://www.kommersant.ru/rss/regions/cheboksary.xml'],
            [171,43,NULL,NULL,NULL,0,'http://xn--80azep.xn--p1ai/ru/rss.xml'],
            [172,44,NULL,NULL,NULL,0,'http://xn----ftbebqosbgnd.xn--p1ai/rss.xml'],
            [173,45,NULL,NULL,NULL,0,'http://openinform.ru/rssexport/'],
            [174,46,NULL,NULL,NULL,0,'http://gelpriboy.ru/index.php?format=feed&type=rss'],
            [175,47,NULL,NULL,NULL,0,'http://xn--80agcq4ai6h.xn--p1ai/rss.xml'],
            [176,48,NULL,NULL,NULL,0,'http://www.rg.ru/xml/index.xml'],
            [177,49,NULL,NULL,NULL,0,'http://feeds.feedburner.com/rosbalt?format=xml'],
            [178,50,NULL,NULL,NULL,0,'http://feeds.feedburner.com/rspp/dTsx?format=xml'],
            [179,51,NULL,NULL,NULL,0,'http://spbvedomosti.ru/rss_mainnews.php'],
            [180,52,NULL,NULL,NULL,0,'http://feeds.feedburner.com/altapress?format=xml'],
            [181,53,NULL,NULL,NULL,0,'http://secretmag.ru/rss/rambler.xml'],
            [182,54,NULL,NULL,NULL,0,'http://myslo.ru/pressa/gazeta_sloboda'],
            [183,55,NULL,NULL,NULL,0,'http://www.tamannews.ru/rss/'],
            [184,56,NULL,NULL,NULL,0,'http://customs.ru/index.php?option=com_ninjarsssyndicator&feed_id=2&format=raw'],
            [185,57,NULL,NULL,NULL,0,'http://rss.feedsportal.com/c/32503/f/492305/index.rss'],
            [186,58,NULL,NULL,NULL,0,'http://www.utrospb.ru/?rss=1'],
            [187,59,NULL,NULL,NULL,0,'http://www.fondsk.ru/rss.html'],
            [188,60,NULL,NULL,NULL,0,'http://vesti.lv/feed'],
            [189,61,NULL,NULL,NULL,0,'http://ulpressa.ru/feed/'],
            [190,62,NULL,NULL,NULL,0,'http://www.chita.ru/rss/'],
            [191,63,NULL,NULL,NULL,0,'http://eizvestia.com/rss/rss.xml'],
            [192,64,NULL,NULL,NULL,0,'http://echospb.ru/rss/articles/?type=1&city=1'],
            [193,65,NULL,NULL,NULL,0,'http://www.dvina29.ru/gazeta-arkhangelsk-side?format=feed'],
            [194,66,NULL,NULL,NULL,0,'http://www.vpk-news.ru/feed'],
            [195,67,NULL,NULL,NULL,0,'http://krasnodar-region.com/index.php?option=com_ninjarsssyndicator&feed_id=1&format=raw'],
            [196,68,NULL,NULL,NULL,0,'http://freebeacon.com/feed/'],
            [197,69,NULL,NULL,NULL,0,'http://feeds.foxnews.com/foxnews/politics?format=xml'],
            [198,70,NULL,NULL,NULL,0,'http://www.huffingtonpost.com/feeds/original_posts/index.xml'],
            [199,71,NULL,NULL,NULL,0,'http://feeds.washingtonpost.com/rss/world'],
            [200,71,NULL,NULL,NULL,0,'http://feeds.washingtonpost.com/rss/politics'],
            [201,71,NULL,NULL,NULL,0,'http://feeds.washingtonpost.com/rss/national'],
            [202,71,NULL,NULL,NULL,0,'http://feeds.washingtonpost.com/rss/business'],
            [203,72,NULL,NULL,NULL,0,'http://www.theguardian.com/uk-news/rss'],
            [204,72,NULL,NULL,NULL,0,'http://www.theguardian.com/world/rss'],
            [205,72,NULL,NULL,NULL,0,'http://www.theguardian.com/uk/business/rss'],
            [206,73,NULL,NULL,NULL,0,'http://feeds.bbci.co.uk/news/world/rss.xml'],
            [206,73,NULL,NULL,NULL,0,'http://feeds.bbci.co.uk/news/uk/rss.xml'],
            [207,73,NULL,NULL,NULL,0,'http://feeds.bbci.co.uk/news/business/rss.xml'],
            [208,74,NULL,NULL,NULL,0,'http://www.wsj.com/xml/rss/3_7031.xml'],
            [209,74,NULL,NULL,NULL,0,'http://www.wsj.com/xml/rss/3_7014.xml'],
            [210,74,NULL,NULL,NULL,0,'http://www.wsj.com/xml/rss/3_7085.xml'],
            [211,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/reuters/businessNews?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/reuters/companyNews?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/news/wealth?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/news/reutersmedia?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/Reuters/PoliticsNews?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/reuters/bankruptcyNews?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/news/economy?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/reuters/globalmarketsNews?format=xml'],
            [212,75,NULL,NULL,NULL,0,'http://feeds.reuters.com/reuters/governmentfilingsNews?format=xml'],
            [213,76,NULL,NULL,NULL,0,'http://feeds.abcnews.com/abcnews/internationalheadlines'],
            [214,76,NULL,NULL,NULL,0,'http://feeds.abcnews.com/abcnews/usheadlines'],
            [215,76,NULL,NULL,NULL,0,'http://feeds.abcnews.com/abcnews/politicsheadlines'],
            [216,76,NULL,NULL,NULL,0,'http://feeds.abcnews.com/abcnews/moneyheadlines'],
            [217,77,NULL,NULL,NULL,0,'http://time.com/business/feed/'],
            [218,77,NULL,NULL,NULL,0,'http://feeds.feedburner.com/time/business?format=xml'],
            [219,77,NULL,NULL,NULL,0,'http://feeds.feedburner.com/time/topstories?format=xml'],
            [220,78,NULL,NULL,NULL,0,'http://www.cbsnews.com/latest/rss/main'],
            [221,79,NULL,NULL,NULL,0,'http://www.cbsnews.com/latest/rss/us'],
            [222,80,NULL,NULL,NULL,0,'http://www.cbsnews.com/latest/rss/politics'],
            [223,80,NULL,NULL,NULL,0,'http://www.cbsnews.com/latest/rss/world'],
            [224,80,NULL,NULL,NULL,0,'http://www.cbsnews.com/latest/rss/moneywatch'],
        ]);
    }
}
