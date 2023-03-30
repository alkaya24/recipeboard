-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: db5012468103.hosting-data.io
-- Erstellungszeit: 30. Mrz 2023 um 19:08
-- Server-Version: 8.0.26
-- PHP-Version: 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dbs10483263`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `duration` int NOT NULL,
  `difficulty` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ingredients` text COLLATE utf8mb4_general_ci NOT NULL,
  `preparation` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `category`, `duration`, `difficulty`, `ingredients`, `preparation`, `image`, `user_id`) VALUES
(2, 'Gebackener Lachs mit Gemüse', '1', 3, '1', '4 Lachsfilets\r\n2 Zucchini\r\n1 Aubergine\r\n1 rote Paprika\r\n1 Zwiebel\r\n2 Knoblauchzehen\r\n2 EL Olivenöl\r\nSalz und Pfeffer nach Geschmack', 'Den Backofen auf 200 Grad Celsius vorheizen.\r\nDas Gemüse waschen und in Würfel schneiden.\r\nDie Zwiebel und Knoblauchzehen schälen und fein hacken.\r\nDas Gemüse, Zwiebel und Knoblauch auf einem Backblech verteilen.\r\nDas Olivenöl über das Gemüse gießen und mit Salz und Pfeffer würzen.\r\nDie Lachsfilets auf das Gemüse legen und ebenfalls mit Salz und Pfeffer würzen.\r\nDas Backblech in den vorgeheizten Ofen schieben und für 20-25 Minuten backen, bis der Lachs durchgegart ist.', '[\"uploads\\/bild1.jpg\",\"uploads\\/bild2.jpg\"]', 8),
(12, 'Grüner Smoothie', '5', 1, '1', '2 Handvoll frischer Spinat\r\n1/2 Gurke\r\n1 Apfel\r\n1 Banane\r\n1 Tasse Wasser', 'Alle Zutaten in einen Mixer geben und mixen, bis alles gut vermischt und cremig ist.\r\nNach Bedarf mehr Wasser hinzufügen, um die gewünschte Konsistenz zu erreichen.', '[\"uploads\\/green-422995_1280.jpg\"]', 9),
(13, 'Mango-Lassi', '5', 1, '1', '1 reife Mango\r\n1/2 Tasse Joghurt\r\n1/2 Tasse Milch\r\n1 TL Honig\r\n1/4 TL gemahlener Kardamom', 'Mango schälen und in Stücke schneiden.\r\nMango, Joghurt, Milch, Honig und Kardamom in einen Mixer geben und glatt rühren.\r\nMit Eiswürfeln servieren.', '[\"uploads\\/mango-lassi-3856051_1920.jpg\"]', 9),
(15, 'Bananen-Smoothie', '5', 1, '1', '2 Bananen\r\n1 Tasse Joghurt\r\n1/2 Tasse Milch\r\n1 TL Honig\r\n1/2 TL Vanilleextrakt', 'Bananen schälen und in Stücke schneiden.\r\nBananen, Joghurt, Milch, Honig und Vanilleextrakt in einen Mixer geben und glatt rühren.\r\nMit Eiswürfeln servieren.', '[\"uploads\\/banana-316648_1280.jpg\"]', 9),
(16, 'Eistee', '5', 1, '1', '2 Teebeutel (z.B. Schwarztee oder Grüntee)\r\n4 Tassen Wasser\r\n1/4 Tasse Zucker\r\n1/4 Tasse Zitronensaft\r\nEiswürfel', 'Teebeutel in 4 Tassen heißem Wasser ziehen lassen und abkühlen lassen.\r\nZucker und Zitronensaft hinzufügen und gut umrühren, bis sich der Zucker aufgelöst hat.\r\nIn ein Glas mit Eiswürfeln gießen und sofort servieren.', '[\"uploads\\/iced-tea-241504_960_720.jpg\"]', 9),
(17, 'Strawberry Lemonade', '5', 1, '1', '1 Tasse frische Erdbeeren, gewaschen und halbiert\r\n1 Tasse frischer Zitronensaft\r\n1 Tasse Wasser\r\n1/2 Tasse Zucker\r\nEiswürfel\r\nZitronenscheiben und Erdbeeren zur Dekoration', 'In einem Mixer die Erdbeeren pürieren.\r\nIn einem Krug den Zitronensaft, Wasser und Zucker vermischen, bis sich der Zucker aufgelöst hat.\r\nDas Erdbeerpüree hinzufügen und gut umrühren.\r\nMit Eiswürfeln servieren und mit Zitronenscheiben und Erdbeeren dekorieren.', '[\"uploads\\/juice-2561339_960_720.jpg\"]', 9),
(18, 'Pina Colada', '5', 1, '1', '1/2 Tasse Ananassaft\r\n1/2 Tasse Kokosmilch\r\n1/4 Tasse weißer Rum\r\n1 Tasse Crushed Ice\r\nAnanas- oder Orangenscheibe zur Dekoration', 'Alle Zutaten in einem Mixer vermengen und pürieren.\r\nIn ein Cocktailglas gießen.\r\nMit einer Ananas- oder Orangenscheibe dekorieren.', '[\"uploads\\/female-731895_960_720.jpg\"]', 9),
(19, 'Matcha Latte', '5', 1, '1', '1 Teelöffel Matcha-Pulver\r\n1 Tasse Milch\r\n1 Teelöffel Honig\r\nEiswürfel', 'In einem Glas das Matcha-Pulver und Honig vermischen.\r\nDie Milch erhitzen und zu dem Glas hinzufügen.\r\nMit einem Milchaufschäumer aufschäumen oder mit einem Schneebesen gut umrühren.\r\nEiswürfel hinzufügen und servieren.', '[\"uploads\\/matcha-green-tea-2683990_960_720.jpg\"]', 9),
(20, 'Wassermelonen-Limetten-Margarita', '5', 1, '1', '4 Tassen gewürfelte Wassermelone\r\n1 Tasse Silber-Tequila\r\n1/2 Tasse Limettensaft\r\n1/4 Tasse Cointreau\r\n1 Tasse Crushed Ice\r\nSalz und Limettenscheibe zur Dekoration', 'Die Wassermelonenwürfel in einen Mixer geben und pürieren.\r\nDen Tequila, Limettensaft und Cointreau in einen Krug geben und vermischen.\r\nDas Wassermelonenpüree hinzufügen und umrühren.\r\nMit Eiswürfeln servieren und mit Salz und einer Limettenscheibe dekorieren.', '[\"uploads\\/margarita-5590642_960_720.jpg\"]', 9),
(21, 'Fruchtiger Sommerdrink', '5', 2, '1', '1 Limette\r\n1 Orange\r\n500 ml Orangensaft\r\n500 ml Ananassaft\r\n500 ml Mineralwasser\r\n50 ml Grenadinesirup\r\nEiswürfel\r\nFrische Früchte (z.B. Ananas, Orangen, Beeren)\r\nMinze', 'Schneiden Sie eine Limette und eine Orange in Scheiben und geben Sie sie in eine Karaffe.\r\nFügen Sie 500 ml Orangensaft, 500 ml Ananassaft und 500 ml Mineralwasser hinzu.\r\nFügen Sie 50 ml Grenadinesirup hinzu und rühren Sie alles gut um.\r\nFügen Sie Eiswürfel hinzu und lassen Sie den Drink für 10 Minuten im Kühlschrank ziehen.\r\nGießen Sie den Drink in Gläser und garnieren Sie mit frischen Früchten und Minze.', '[\"uploads\\/cocktail-3408834_960_720.jpg\"]', 9),
(22, 'Quesadilla Snack', '4', 1, '1', '2 große Weizentortillas\r\n1/2 Tasse geriebener Cheddar-Käse\r\n1/2 Tasse geriebener Monterey Jack-Käse\r\n1/4 Tasse gehackte grüne Zwiebeln\r\n1/4 Tasse gehackte Tomaten\r\n1/4 Tasse gehackter Koriander\r\n1/4 Tasse saure Sahne\r\n1 Esslöffel Butter', 'Erhitze eine Pfanne auf mittlerer Stufe.\r\nLegen Sie eine Tortilla in die Pfanne und bestreuen Sie sie mit Käse, grünen Zwiebeln, Tomaten, Koriander und saurer Sahne.\r\nLegen Sie die zweite Tortilla oben drauf und drücken Sie sie sanft an.\r\nWenn der Käse schmilzt und die untere Tortilla knusprig ist, wenden Sie die Quesadilla mit einem Spatel um und braten Sie sie von der anderen Seite, bis sie knusprig und golden ist.\r\nSchneiden Sie die Quesadilla in Dreiecke und servieren Sie sie heiß.', '[\"uploads\\/quesadilla-2297035_1920.jpg\"]', 9),
(23, 'Mini-Pizzen', '4', 2, '1', 'Englische Muffins\r\nTomatensoße\r\nGeriebener Käse\r\nBelag nach Wahl (z.B. Schinken, Salami, Pilze, Paprika, Zwiebeln)', 'Den Backofen auf 200°C vorheizen.\r\nEnglische Muffins halbieren und mit Tomatensoße bestreichen.\r\nMit geriebenem Käse bestreuen und mit Belag nach Wahl belegen.\r\nFür ca. 10-12 Minuten im Ofen backen, bis der Käse geschmolzen und die Mini-Pizzen goldbraun sind.', '[\"uploads\\/istockphoto-1265089223-612x612.jpg\"]', 9),
(24, 'Avocado-Tomatensalat', '4', 1, '1', '2 Avocados, gewürfelt\r\n2 Tomaten, gewürfelt\r\n1/4 Tasse gehackte rote Zwiebeln\r\n1/4 Tasse gehackter Koriander\r\nSaft von 1 Limette\r\nSalz und Pfeffer nach Geschmack', 'Avocado, Tomaten, rote Zwiebeln und Koriander in einer Schüssel vermengen.\r\nMit Limettensaft, Salz und Pfeffer abschmecken.\r\nSofort servieren oder im Kühlschrank aufbewahren, bis zum Servieren.', '[\"uploads\\/flat-lay-2583212_960_720.jpg\"]', 9),
(25, 'Avocado Toast', '4', 1, '1', '1 Avocado\r\n2 Scheiben Brot\r\n1 Knoblauchzehe\r\n1 Tomate\r\nSalz und Pfeffer', 'Avocado halbieren, entkernen und mit einer Gabel in einer Schüssel zerdrücken.\r\nKnoblauchzehe schälen und in die Avocado-Mischung pressen. Mit Salz und Pfeffer würzen.\r\nTomate in Scheiben schneiden.\r\nBrot toasten und mit der Avocado-Mischung bestreichen.\r\nTomatenscheiben auf die Avocado legen und servieren.', '[\"uploads\\/toast-6607782_1920.jpg\"]', 9),
(26, 'Hummus mit Gemüsesticks', '4', 2, '1', '1 Dose Kichererbsen\r\n2 Knoblauchzehen\r\n2 EL Tahini\r\n3 EL Zitronensaft\r\n2 EL Olivenöl\r\n1 TL Kreuzkümmel\r\nSalz und Pfeffer\r\nGemüsesticks (z.B. Karotten, Paprika, Gurke)', 'Kichererbsen abgießen und abspülen.\r\nKnoblauch schälen und grob hacken.\r\nKichererbsen, Knoblauch, Tahini, Zitronensaft, Olivenöl und Kreuzkümmel in einen Mixer geben und zu einer cremigen Masse pürieren.\r\nMit Salz und Pfeffer abschmecken.\r\nGemüsesticks waschen und in mundgerechte Stücke schneiden.\r\nHummus in eine Schüssel geben und mit Gemüsesticks servieren.', '[\"uploads\\/hummus-4034050_1920.jpg\"]', 9),
(27, 'Gefüllte Champignons', '4', 3, '2', '6 große Champignons\r\n1 Zwiebel\r\n1 Knoblauchzehe\r\n1 EL Olivenöl\r\n50 g Parmesan\r\n2 EL gehackte Petersilie\r\nSalz und Pfeffer', 'Champignons putzen und Stiele entfernen.\r\nZwiebel und Knoblauch schälen und fein hacken.\r\nOlivenöl in einer Pfanne erhitzen und Zwiebel und Knoblauch darin glasig dünsten.\r\nStiele der Champignons fein hacken und zusammen mit dem Parmesan und der Petersilie zur Zwiebel-Knoblauch-Mischung geben. Mit Salz und Pfeffer würzen.\r\nDie Champignonköpfe mit der Mischung füllen.\r\nIn eine Auflaufform setzen und im vorgeheizten Ofen bei 200°C ca. 15 Minuten backen.', '[\"uploads\\/mushrooms-3069822_1920.jpg\"]', 9),
(28, 'Caprese-Spieße', '4', 2, '1', '1 Packung Mini Mozzarella Kugeln\r\n1 Packung Kirschtomaten\r\nFrisches Basilikum\r\nBalsamico-Creme\r\nSalz und Pfeffer', 'Mozzarella und Tomaten abwechselnd auf Spieße stecken.\r\nMit frischem Basilikum garnieren.\r\nMit Balsamico-Creme beträufeln und mit Salz und Pfeffer würzen.', '[\"uploads\\/tomatoes-1629186_1920.jpg\"]', 9),
(30, 'Haferflocken mit Beeren und Mandeln', '3', 1, '1', '50g Haferflocken\r\n150ml Milch\r\n1/2 TL Honig\r\n1 Handvoll Beeren\r\n1 EL Mandeln', 'Haferflocken, Milch und Honig in einem Topf bei mittlerer Hitze erhitzen.\r\n\r\nUnter Rühren köcheln lassen, bis die Haferflocken weich sind und die Milch aufgenommen wurde.\r\n\r\nIn eine Schüssel geben und mit Beeren und Mandeln garnieren.', '[\"uploads\\/berries-1846085_1920.jpg\"]', 9),
(31, 'Eiersalat', '3', 2, '1', 'Eier, Gurken, Zwiebeln, Mayonnaise, Senf, Essig, Salz, Pfeffer', 'Eier hart kochen, abkühlen lassen und in kleine Stücke schneiden. Gurken und Zwiebeln ebenfalls klein schneiden. Mayonnaise, Senf, Essig, Salz und Pfeffer vermischen. Eier, Gurken und Zwiebeln unter die Sauce heben.', '[\"uploads\\/egg-salad-3290722_1920.jpg\"]', 9),
(36, 'Himbeer-Limonade', '5', 1, '1', '1 Tasse frische Himbeeren\r\n1/2 Tasse frisch gepresster Limettensaft\r\n1/2 Tasse Zucker\r\n1 Liter Soda-Wasser\r\nEiswürfel', 'In einem Topf die Himbeeren, den Limettensaft und den Zucker bei mittlerer Hitze erhitzen, bis der Zucker vollständig aufgelöst ist und die Himbeeren weich sind. Das Ganze vom Herd nehmen und abkühlen lassen.\r\nDie Himbeer-Limetten-Mischung durch ein feines Sieb passieren, um die Samen zu entfernen. Die Flüssigkeit in einen Krug geben.\r\nSoda-Wasser in den Krug gießen und umrühren.\r\nMit Eiswürfeln servieren und genießen!', '[\"uploads\\/food-50937_1280.jpg\"]', 9),
(37, 'Avocado-Ei-Salat:', '4', 2, '1', '2 reife Avocados\r\n4 hart gekochte Eier\r\n2 Esslöffel Zitronensaft\r\n1/4 Teelöffel Knoblauchpulver\r\nSalz und Pfeffer nach Geschmack', 'Die Avocados schälen, den Kern entfernen und das Fruchtfleisch in eine Schüssel geben.\r\nDie hart gekochten Eier schälen und in kleine Würfel schneiden. Zu den Avocados in die Schüssel geben.\r\nZitronensaft, Knoblauchpulver, Salz und Pfeffer hinzufügen und alles gut vermengen.\r\nDen Salat kalt stellen und vor dem Servieren nach Belieben garnieren.', '[\"uploads\\/flat-lay-2583212_1920.jpg\"]', 9),
(38, 'Süße Kartoffelchips', '4', 3, '2', '2 süße Kartoffeln\r\n2 Esslöffel Olivenöl\r\n1/4 Teelöffel Paprikapulver\r\n1/4 Teelöffel Salz', 'Den Ofen auf 180 Grad Celsius vorheizen und ein Backblech mit Backpapier auslegen.\r\nDie Kartoffeln schälen und in dünne Scheiben schneiden.\r\nIn einer Schüssel das Olivenöl mit Paprikapulver und Salz vermengen.\r\nDie Kartoffelscheiben in der Ölmischung wenden, bis sie vollständig bedeckt sind.\r\nDie Kartoffelscheiben auf dem Backblech ausbreiten und im Ofen etwa 25-30 Minuten backen, bis sie knusprig sind.\r\nAus dem Ofen nehmen und abkühlen lassen.', '[\"uploads\\/hd-wallpaper-1418192_1920.jpg\"]', 9),
(39, ' Gebackene Avocado-Eier-Boote', '4', 3, '2', '2 Avocados\r\n4 Eier\r\n1/2 Tasse geriebener Cheddar-Käse\r\n2 Scheiben Speck, gekocht und zerbröckelt\r\nSalz und Pfeffer nach Geschmack', 'Den Ofen auf 200°C vorheizen und eine Backform mit Backpapier auslegen.\r\nDie Avocados halbieren und den Kern entfernen.\r\nMit einem Löffel etwas Fruchtfleisch aus der Mitte der Avocado entfernen, um Platz für das Ei zu schaffen.\r\nDie Eier in jede Avocadohälfte geben.\r\nMit Salz und Pfeffer würzen und den geriebenen Käse darüberstreuen.\r\nDie Avocadohälften auf das Backblech legen und für 15-20 Minuten backen, bis das Ei gestockt und der Käse geschmolzen ist.\r\nMit zerbröckeltem Speck garnieren und servieren.', '[\"uploads\\/avocado-5332878_1920.jpg\"]', 9),
(40, 'Rührei mit Gemüse', '3', 2, '1', '3 Eier\r\n1/4 Tasse gehackte Zwiebeln\r\n1/4 Tasse gehackte Paprika\r\n1/4 Tasse gehackte Tomaten\r\n1/4 Tasse geriebener Käse\r\n1 Esslöffel Butter', 'Schlagen Sie die Eier in einer Schüssel auf und stellen Sie sie beiseite.\r\nIn einer Pfanne die Butter schmelzen und die Zwiebeln und Paprika hinzufügen. Kochen Sie das Gemüse für 3-5 Minuten, bis es weich ist.\r\nGeben Sie die Tomaten in die Pfanne und braten Sie alles weitere 2-3 Minuten.\r\nGeben Sie die geschlagenen Eier in die Pfanne und rühren Sie sie zusammen mit dem Gemüse, bis sie gekocht sind.\r\nStreuen Sie den geriebenen Käse über das Rührei und servieren Sie es sofort.', '[\"uploads\\/istockphoto-1080350222-612x612.jpg\"]', 9),
(41, 'Omelett mit Spinat und Feta', '3', 2, '1', '3 Eier\r\n1 Handvoll Spinat\r\n50g Feta-Käse\r\nSalz, Pfeffer', 'Eier in einer Schüssel verquirlen, Spinat in kleine Stücke schneiden und zum Ei geben. Mit Salz und Pfeffer würzen. Alles in eine Pfanne geben und auf mittlerer Hitze braten. Wenn die Oberseite des Omeletts fast gestockt ist, den Feta darüberbröseln und das Omelett zusammenklappen. Noch einige Minuten braten und dann servieren.', '[\"uploads\\/omelet-933514_1920.jpg\"]', 9),
(43, 'Rührei mit Tomaten', '3', 1, '1', '3 Eier\r\n1 Tomate\r\n1 EL Butter\r\nSalz, Pfeffer\r\n', 'Eier in einer Schüssel verquirlen und mit Salz und Pfeffer würzen. Tomate in kleine Stücke schneiden. Butter in einer Pfanne erhitzen, Eier hineingeben und stocken lassen. Tomatenstücke auf das Rührei geben und servieren.\r\n', '[\"uploads\\/scrambled-eggs-2619907_1920.jpg\"]', 9),
(44, 'Mediterraner Couscous-Salat mit Tomaten und Feta', '2', 2, '1', '200 g Couscous\r\n250 ml Gemüsebrühe\r\n1 Dose Kichererbsen\r\n1 Paprika\r\n2 Tomaten\r\n1 Zwiebel\r\n100 g Feta\r\n2 EL Olivenöl\r\n2 EL Zitronensaft\r\nSalz, Pfeffer', 'Couscous in eine Schüssel geben und mit Gemüsebrühe übergießen. 5 Minuten quellen lassen, dann mit einer Gabel auflockern.\r\nPaprika und Tomaten waschen und in Würfel schneiden. Zwiebel schälen und in feine Ringe schneiden.\r\nKichererbsen abtropfen lassen und unter den Couscous mischen.\r\nGemüse und Zwiebeln zum Couscous geben und alles gut vermischen.\r\nFeta in kleine Würfel schneiden und über den Salat geben.\r\nOlivenöl und Zitronensaft vermischen und über den Salat geben.\r\nMit Salz und Pfeffer abschmecken.\r\n', '[\"uploads\\/couscous-1569590_1920.jpg\"]', 9),
(45, 'Reis mit Gemüse und Ei', '2', 3, '1', '200 g Reis\r\n400 ml Wasser\r\n1 Paprika\r\n1 Zucchini\r\n1 Karotte\r\n2 Eier\r\n2 EL Öl\r\n2 EL Sojasauce\r\nSalz, Pfeffer', 'Reis mit Wasser in einem Topf aufkochen und bei niedriger Hitze ca. 15 Minuten köcheln lassen.\r\nPaprika, Zucchini und Karotte waschen und in kleine Würfel schneiden.\r\nEier in einer Pfanne aufschlagen und unter ständigem Rühren anbraten, bis sie gestockt sind.\r\nGemüse in einer Pfanne mit Öl anbraten, bis es bissfest ist.\r\nReis, Gemüse und Eier in die Pfanne geben und vermischen.\r\nMit Sojasauce, Salz und Pfeffer abschmecken.', '[\"uploads\\/bob-694825_1920.jpg\"]', 9),
(46, 'Spaghetti Aglio e Olio', '2', 3, '1', '400 g Spaghetti\r\n4 Knoblauchzehen\r\n1/2 TL Chiliflocken\r\n100 ml Olivenöl\r\nSalz\r\nPetersilie zum Garnieren', 'Wasser in einem großen Topf zum Kochen bringen, salzen und die Spaghetti nach Packungsanweisung al dente kochen.\r\n\r\nInzwischen Knoblauch schälen und in dünne Scheiben schneiden.\r\n\r\nOlivenöl in einer Pfanne erhitzen, Knoblauch und Chiliflocken hinzufügen und goldbraun anbraten.\r\n\r\nDie gekochten Spaghetti abgießen und zur Knoblauch-Chili-Öl-Mischung geben. Gut vermischen und mit Salz abschmecken.\r\n\r\nMit Petersilie garnieren und servieren.\r\n\r\n', '[\"uploads\\/1000_F_515552673_mUbUlS1e51SLJRZDa9KS9QzEOgRzAotL.jpg\"]', 9),
(47, 'Griechischer Salat', '2', 2, '1', '4 Tomaten\r\n1 Gurke\r\n1 rote Zwiebel\r\n1 grüne Paprika\r\n150 g Feta-Käse\r\n1 Handvoll Kalamata-Oliven\r\n3 EL Olivenöl\r\n1 EL Rotweinessig\r\nSalz und Pfeffer\r\n1 TL Oregano\r\n', 'Tomaten, Gurke und Paprika in Würfel schneiden. Zwiebel in dünne Ringe schneiden.\r\n\r\nGemüse, Oliven und gewürfelten Feta in einer großen Schüssel vermengen.\r\n\r\nOlivenöl, Rotweinessig, Salz, Pfeffer und Oregano zu einer Vinaigrette vermischen und über den Salat geben. Vorsichtig vermengen und servieren.', '[\"uploads\\/salad-5904093_1920.jpg\"]', 9),
(48, 'Kürbissuppe', '2', 3, '2', '1 kg Kürbisfleisch\r\n1 Zwiebel\r\n2 Knoblauchzehen\r\n1 L Gemüsebrühe\r\n200 ml Kokosmilch\r\n2 EL Olivenöl\r\nSalz und Pfeffer\r\n1 TL Korianderpulver\r\nKürbiskerne zum Garnieren', 'Kürbis schälen, entkernen und in Würfel schneiden. Zwiebel und Knoblauch fein hacken.\r\n\r\nOlivenöl in einem großen Topf erhitzen und Zwiebel und Knoblauch darin anschwitzen. Kürbiswürfel hinzufügen und kurz mit anbraten.\r\n\r\nGemüsebrühe hinzufügen und zum Kochen bringen. 20-25 Minuten köcheln lassen, bis der Kürbis weich ist.\r\n\r\nDie Suppe pürieren und Kokosmilch unterrühren. Mit Salz, Pfeffer und Korianderpulver abschmecken.\r\n\r\nIn Schalen servieren und mit Kürbiskernen garnieren.', '[\"uploads\\/pumpkin-soup-2972858_1920.jpg\"]', 9),
(49, 'Quinoa-Salat mit Avocado', '2', 3, '1', '200 g Quinoa\r\n1 Avocado\r\n1 rote Paprika\r\n1/2 Gurke\r\n100 g Kirschtomaten\r\n1 Bund Koriander\r\n2 EL Zitronensaft\r\n4 EL Olivenöl\r\nSalz und Pfeffer\r\n', 'Quinoa nach Packungsanweisung kochen und abkühlen lassen.\r\n\r\nAvocado halbieren, entkernen, schälen und in Würfel schneiden. Paprika, Gurke und Kirschtomaten ebenfalls in Würfel bzw. Hälften schneiden. Koriander hacken.\r\n\r\nAlle Zutaten in einer großen Schüssel vermischen.\r\n\r\nZitronensaft, Olivenöl, Salz und Pfeffer zu einer Vinaigrette vermischen und über den Salat geben. Gut vermengen und servieren.', '[\"uploads\\/quinoa-2220490_1920.jpg\"]', 9),
(50, 'Linsen-Curry', '2', 3, '2', '250 g rote Linsen\r\n1 Zwiebel\r\n2 Knoblauchzehen\r\n1 EL Ingwer, gerieben\r\n1 EL Currypulver\r\n400 ml Kokosmilch\r\n400 ml Gemüsebrühe\r\n2 EL Olivenöl\r\nSalz und Pfeffer\r\nKoriander zum Garnieren', 'Linsen abspülen und abtropfen lassen. Zwiebel und Knoblauch fein hacken.\r\n\r\nOlivenöl in einem großen Topf erhitzen. Zwiebel, Knoblauch und Ingwer darin anschwitzen. Currypulver hinzufügen und kurz mitbraten.\r\n\r\nLinsen, Kokosmilch und Gemüsebrühe hinzufügen und zum Kochen bringen. 20-25 Minuten köcheln lassen, bis die Linsen weich sind.\r\n\r\nMit Salz und Pfeffer abschmecken. In Schalen servieren und mit Koriander garnieren.', '[\"uploads\\/istockphoto-1177840203-612x612.jpg\"]', 9),
(51, 'Spinat-Feta-Quiche', '2', 3, '2', '1 Packung Blätterteig (ca. 250 g)\r\n400 g frischer Spinat\r\n200 g Feta-Käse\r\n4 Eier\r\n200 ml Sahne\r\n1 Zwiebel\r\n2 EL Olivenöl\r\nSalz und Pfeffer\r\nMuskatnuss', 'Backofen auf 200°C vorheizen. Eine Quiche- oder Tarteform einfetten und mit Blätterteig auslegen. Den Teig mit einer Gabel mehrmals einstechen.\r\nSpinat waschen und abtropfen lassen. Zwiebel fein hacken.\r\nOlivenöl in einer Pfanne erhitzen und die Zwiebel darin anschwitzen. Spinat hinzufügen und zusammenfallen lassen. Abkühlen lassen.\r\nEier und Sahne verquirlen, mit Salz, Pfeffer und Muskatnuss würzen.\r\n5. Feta-Käse in Würfel schneiden und unter den Spinat mischen.\r\n\r\nSpinat-Feta-Mischung auf dem Blätterteig verteilen. Die Eier-Sahne-Mischung darüber gießen.\r\n\r\nQuiche im vorgeheizten Backofen bei 200°C für 40-45 Minuten backen, bis die Oberfläche goldbraun ist und die Füllung fest geworden ist.\r\n\r\nQuiche aus dem Ofen nehmen, leicht abkühlen lassen und in Stücke schneiden. Warm oder kalt servieren.\r\n\r\n', '[\"uploads\\/quiche-2468840_1920.jpg\"]', 9),
(52, 'Falafel-Wraps', '2', 3, '1', '8 vorgefertigte Falafel-Bällchen\r\n4 Weizen-Tortillas\r\n1 Tomate\r\n1/2 Gurke\r\n1/2 rote Zwiebel\r\n100 g Hummus\r\n50 g Joghurt\r\nSalatblätter\r\n1 EL Olivenöl', 'Falafel-Bällchen nach Packungsanweisung zubereiten.\r\n\r\nTomate, Gurke und Zwiebel in dünne Scheiben schneiden.\r\n\r\nTortillas kurz in einer Pfanne oder auf dem Grill erwärmen.\r\n\r\nTortillas mit Hummus bestreichen, Salatblätter, Tomaten-, Gurken- und Zwiebelscheiben darauf verteilen.\r\n\r\nFalafel-Bällchen darauflegen und mit Joghurt beträufeln. Wraps einrollen und genießen.', '[\"uploads\\/falafel-5203363_1920.jpg\"]', 9),
(53, 'Vegane Pilz-Stroganoff', '2', 3, '2', '500 g Champignons\r\n1 Zwiebel\r\n2 Knoblauchzehen\r\n1 EL Paprikapulver\r\n200 ml Gemüsebrühe\r\n200 ml vegane saure Sahne\r\n2 EL Olivenöl\r\nSalz und Pfeffer\r\nPetersilie zum Garnieren\r\n', 'Champignons putzen und in Scheiben schneiden. Zwiebel und Knoblauch fein hacken.\r\nOlivenöl in einer Pfanne erhitzen und Zwiebel und Knoblauch darin anschwitzen. Champignons hinzufügen und anbraten, bis sie leicht gebräunt sind.\r\nPaprikapulver hinzufügen und kurz mitbraten. Gemüsebrühe angießen und 5-10 Minuten köcheln lassen.\r\nVegane saure Sahne unterrühren und mit Salz und Pfeffer abschmecken.\r\nPilz-Stroganoff in Schalen servieren und mit gehackter Petersilie garnieren. Dazu passt Reis oder Nudeln.', '[\"uploads\\/Pilz-Stroganoff-Cremige-Champignon-Sauce-mit-Pasta-Rezept-1-of-6-800x533.jpg\"]', 9),
(54, 'Lachsfilet mit Zitronen-Dill-Sauce', '1', 3, '1', '4 Lachsfilets (ca. 150 g)\r\n1 Zitrone\r\n100 ml Sahne\r\n2 EL Dill, gehackt\r\n2 EL Butter\r\nSalz und Pfeffer\r\n1 EL Olivenöl', 'Lachsfilets abspülen und trockentupfen. Mit Salz und Pfeffer würzen.\r\n\r\nOlivenöl in einer Pfanne erhitzen und Lachsfilets darin 3-4 Minuten pro Seite anbraten.\r\n\r\nButter in einer zweiten Pfanne schmelzen, Zitronensaft und Sahne hinzufügen. Dill unterrühren und mit Salz und Pfeffer abschmecken.\r\n\r\nLachsfilets auf Teller anrichten und mit Zitronen-Dill-Sauce beträufeln. Dazu passt Kartoffelpüree oder Gemüse.', '[\"uploads\\/salmon-3819966_1920.jpg\"]', 9),
(56, 'Hähnchen-Fajitas', '1', 3, '1', '500 g Hähnchenbrustfilet\r\n1 rote Paprika\r\n1 grüne Paprika\r\n1 Zwiebel\r\n2 EL Fajita-Gewürzmischung\r\n4 Weizen-Tortillas\r\n2 EL Olivenöl\r\n100 g geriebener Cheddar\r\nSalat, Tomaten und Guacamole zum Servieren', 'Hähnchenbrustfilet in Streifen schneiden, Paprika und Zwiebel in dünne Scheiben schneiden.\r\nOlivenöl in einer Pfanne erhitzen und Hähnchenstreifen darin anbraten. Paprika und Zwiebel hinzufügen und weitere 5-7 Minuten braten, bis das Gemüse weich ist.\r\n3. Fajita-Gewürzmischung hinzufügen und gut vermischen, bis alles gleichmäßig bedeckt ist.\r\n\r\nTortillas kurz in einer Pfanne oder auf dem Grill erwärmen.\r\n\r\nHähnchen-Fajita-Mischung auf die Tortillas verteilen, mit geriebenem Cheddar bestreuen und zusammenrollen.\r\n\r\nMit Salat, Tomaten und Guacamole servieren.', '[\"uploads\\/tortilla-5247122_1920.jpg\"]', 9),
(57, 'Auberginen-Parmigiana', '1', 3, '2', '2 Auberginen\r\n500 g passierte Tomaten\r\n1 Zwiebel\r\n2 Knoblauchzehen\r\n1 EL Olivenöl\r\n1 TL Oregano\r\n150 g geriebener Mozzarella\r\n50 g Parmesan\r\nSalz und Pfeffer\r\nÖl zum Braten', 'Auberginen in Scheiben schneiden, salzen und 15 Minuten ziehen lassen. Anschließend trockentupfen.\r\n\r\nZwiebel und Knoblauch fein hacken. Olivenöl in einer Pfanne erhitzen und Zwiebel und Knoblauch darin anschwitzen. Passierte Tomaten hinzufügen, mit Oregano, Salz und Pfeffer würzen und 10 Minuten köcheln lassen.\r\n\r\nAuberginenscheiben in einer separaten Pfanne mit etwas Öl von beiden Seiten goldbraun braten.\r\n\r\nEine Lage Auberginenscheiben in einer Auflaufform auslegen, mit Tomatensauce, Mozzarella und Parmesan bestreuen. Vorgang wiederholen, bis alle Zutaten aufgebraucht sind.\r\n\r\nIm vorgeheizten Backofen bei 180°C für 30-35 Minuten backen, bis der Käse geschmolzen und leicht gebräunt ist.', '[\"uploads\\/eggplant-920269_1920.jpg\"]', 9),
(58, 'Thai-Gemüse-Curry', '1', 3, '1', '1 EL Kokosöl\r\n1 Zwiebel\r\n2 Knoblauchzehen\r\n1 EL Ingwer, gerieben\r\n2 EL rote Thai-Currypaste\r\n400 ml Kokosmilch\r\n300 g gemischtes Gemüse (z.B. Paprika, Brokkoli, Karotten, Zucchini)\r\n200 g Tofu, gewürfelt\r\n2 EL Sojasauce\r\n1 EL Limettensaft\r\nKoriander zum Garnieren', 'Gemüse in mundgerechte Stücke schneiden. Zwiebel, Knoblauch und Ingwer fein hacken.\r\nKokosöl in einer Pfanne erhitzen und Zwiebel, Knoblauch und Ingwer darin anschwitzen. Currypaste hinzufügen und kurz mitbraten.\r\nKokosmilch angießen und zum Kochen bringen. Gemüse und Tofu hinzufügen und 15-20 Minuten köcheln lassen, bis das Gemüse weich ist.\r\nMit Sojasauce und Limettensaft abschmecken. In Schalen servieren und mit gehacktem Koriander garnieren. Dazu passt Reis oder Nudeln.', '[\"uploads\\/green-curry-6386360_1920.jpg\"]', 9),
(59, 'Zucchini-Spaghetti mit Avocado-Pesto', '1', 3, '1', '4 Zucchini\r\n1 Avocado\r\n1 Handvoll Basilikum\r\n2 Knoblauchzehen\r\n50 g Pinienkerne\r\n50 g Parmesan\r\n4 EL Olivenöl\r\nSalz und Pfeffer', 'Zucchini mit einem Spiralschneider in Spaghettiform schneiden oder in dünne Streifen schälen.\r\n\r\nAvocado halbieren, entkernen und schälen. Basilikum, Knoblauch, Pinienkerne, Parmesan, Olivenöl, Salz und Pfeffer in einen Mixer geben und zu einem Pesto verarbeiten.\r\n\r\nZucchini-Spaghetti in einer Pfanne für 2-3 Minuten erhitzen. Avocado-Pesto hinzufügen und gut vermischen.\r\n\r\nIn Schalen servieren und nach Belieben mit zusätzlichem Parmesan bestreuen.', '[\"uploads\\/,id=f430ed8e,b=lecker,w=610,cg=c.jpg\"]', 9),
(60, 'Shakshuka', '1', 3, '1', '1 EL Olivenöl\r\n1 Zwiebel\r\n1 rote Paprika\r\n2 Knoblauchzehen\r\n1 TL Kreuzkümmel\r\n1 TL Paprikapulver\r\n1/2 TL Cayennepfeffer\r\n400 g gehackte Tomaten (Dose)\r\n4 Eier\r\nSalz und Pfeffer\r\nKoriander zum Garnieren', 'Zwiebel, Paprika und Knoblauch fein hacken.\r\nOlivenöl in einer großen Pfanne erhitzen und Zwiebel, Paprika und Knoblauch darin anschwitzen. Kreuzkümmel, Paprikapulver und Cayennepfeffer hinzufügen und kurz mitbraten.\r\nGehackte Tomaten hinzufügen, mit Salz und Pfeffer würzen und 10 Minuten köcheln lassen.\r\nVier Mulden in der Tomatenmischung formen und je ein Ei hineinschlagen. Zugedeckt bei niedriger Hitze 8-10 Minuten garen, bis das Eiweiß gestockt ist und das Eigelb noch weich ist.\r\n5. Shakshuka mit gehacktem Koriander garnieren und mit Brot servieren.', '[\"uploads\\/kagyana-2955466_1920.jpg\"]', 9),
(61, 'Quinoa-Gemüse-Pfanne', '1', 3, '1', '200 g Quinoa\r\n400 ml Gemüsebrühe\r\n1 EL Olivenöl\r\n1 Zwiebel\r\n1 rote Paprika\r\n1 Zucchini\r\n100 g Kirschtomaten\r\n100 g Erbsen (frisch oder TK)\r\n2 EL Zitronensaft\r\nSalz und Pfeffer\r\nPetersilie zum Garnieren', 'Quinoa in einem Sieb abspülen. Gemüsebrühe in einem Topf zum Kochen bringen, Quinoa hinzufügen und etwa 20 Minuten bei niedriger Hitze köcheln lassen, bis die Flüssigkeit aufgesogen ist.\r\n\r\nZwiebel fein hacken, Paprika und Zucchini in Würfel schneiden, Kirschtomaten halbieren.\r\n\r\nOlivenöl in einer Pfanne erhitzen und Zwiebel darin anschwitzen. Paprika, Zucchini, Kirschtomaten und Erbsen hinzufügen und 5-7 Minuten braten, bis das Gemüse weich ist.\r\n\r\nGekochten Quinoa hinzufügen, gut vermischen und mit Zitronensaft, Salz und Pfeffer abschmecken.\r\n\r\nIn Schalen servieren und mit gehackter Petersilie garnieren.', '[\"uploads\\/pan-1832926_1920.jpg\"]', 9),
(63, 'Erdbeer-Basilikum-Limonade', '5', 2, '1', '500 g frische Erdbeeren\r\n1 Handvoll frische Basilikumblätter\r\n100 g Zucker\r\n120 ml frisch gepresster Zitronensaft\r\n1 Liter kaltes Wasser\r\nEiswürfel\r\nZusätzliche Erdbeeren und Basilikumblätter zum Garnieren\r\n', 'Erdbeeren waschen, putzen und vierteln. Basilikumblätter waschen und trockenschütteln.\r\nIn einem Mixer oder einer Küchenmaschine Erdbeeren, Basilikumblätter, Zucker und Zitronensaft pürieren, bis eine glatte Mischung entsteht.\r\nDie Erdbeer-Basilikum-Mischung durch ein feines Sieb in einen Krug gießen, um die Samen und das Fruchtfleisch zu entfernen.\r\nKaltes Wasser zur Erdbeer-Basilikum-Mischung hinzufügen und gut umrühren.\r\nDie Limonade mit Eiswürfeln, zusätzlichen Erdbeeren und Basilikumblättern garnieren. In Gläser füllen und sofort servieren. Für einen erfrischenden Sommerdrink kann man auch Mineralwasser statt stillem Wasser verwenden.\r\n\r\n\r\n', '[\"uploads\\/strawberry-390238_1920.jpg\",\"uploads\\/drinking-4272207_1920.jpg\",\"uploads\\/smoothie-5357371_1920.jpg\",\"uploads\\/drinking-4272206_1920.jpg\"]', 9),
(68, 'Serhat', '4', 8, '3', 'Salz, Pfeffer, Halal Fleisch, Paprika Edelsüß, Knoblauch, Chillipulver, Sahne, Tomatenmark, Paprikamark und passierte Tomaten.', 'Alles mischen und tada', '[\"uploads\\/IMG_5991.JPG\"]', 9);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `vorname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nachname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `vorname`, `nachname`) VALUES
(8, 'kayaali24@outlook.com', '$2y$10$aEZyOcgzyPlAVvGBbz0OIe14CAwOFPrnGAa77q/KnUFDXEa.kV1Tm', 'Ali', 'Kaya'),
(9, 's.emrek@web.de', '$2y$10$94nAzRwxFNM4HXurPuiy2Or7bm2OracXyXgI2QMGRrMbD3hl226ZG', 'Serhat', 'Emrek');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
