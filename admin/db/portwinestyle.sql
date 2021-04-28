-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 28-Abr-2021 às 09:44
-- Versão do servidor: 5.7.32
-- versão do PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de dados: `portwinestyle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `route_botao` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banner`
--

INSERT INTO `banner` (`id`, `route_botao`, `foto`, `is_active`) VALUES
(1, 'sobrenos.php', 'vinha.jpg', 1),
(2, 'produtos.php?id=&keyword=&page=1', 'cork.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `banner_idiomas`
--

CREATE TABLE `banner_idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(2) NOT NULL,
  `texto` varchar(50) NOT NULL,
  `texto_botao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `banner_idiomas`
--

INSERT INTO `banner_idiomas` (`id`, `idioma`, `texto`, `texto_botao`) VALUES
(1, 'en', 'Discover new flavors!', 'Get to know us'),
(1, 'pt', 'Descobrir novos sabores!', 'Conheça-nos'),
(1, 'ru', 'Откройте для себя новые вкусы!', ' Узнай нас'),
(2, 'en', 'Curious to know our products?', ' View more'),
(2, 'pt', 'Curioso para ver os nossos produtos?', 'Ver mais'),
(2, 'ru', ' Хотите узнать о наших продуктах?', 'Посмотреть больше');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `flaticon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `flaticon`) VALUES
(1, 'flaticon-glass-of-champagne'),
(2, 'flaticon-glass-of-white-wine'),
(3, 'flaticon-glass-of-dessert-wine'),
(4, 'flaticon-glass-of-rose-wine'),
(5, 'flaticon-glass-of-red-wine'),
(6, 'flaticon-glass-of-white-wine');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias_idiomas`
--

CREATE TABLE `categorias_idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(2) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias_idiomas`
--

INSERT INTO `categorias_idiomas` (`id`, `idioma`, `nome`, `descricao`) VALUES
(1, 'en', 'Sparkling Wines', 'Wine Produced with grapes chosen from the best traditional grape varieties, with skin pre-maceration and fermentation in stainless steel tanks at 16ºC for 16 days. In the mouth is fresh and acidic with a good persistence and presence of well-integrated CO2. It is a wine with a young, light and fruity character, with an acídula mouth and quite fresh. Very balanced. Excellent to accompany seafood dishes and fish, pasta and salads.'),
(1, 'pt', 'Espumantes', 'Vinho Produzido com uvas seleccionadas das melhores castas tradicionais, com pré-maceração pelicular e fermentação em cubas de inox a 16ºC durante 16 dias. Na boca é fresco e ácido, com boa persistência e presença de CO2 bem integrado. É um vinho de carácter jovem, leve e frutado, com boca acídula e bastante fresco. Muito equilibrado. Excelente para acompanhar pratos de marisco e peixes, massas e saladas.'),
(1, 'ru', 'Игристые вина', 'Вино Изготовлено из винограда, отобранного из лучших традиционных сортов винограда, с предварительной мацерацией кожицы и ферментацией в резервуарах из нержавеющей стали при 16ºC в течение 16 дней. Во рту свежий и кислый с хорошей стойкостью и наличием хорошо интегрированного CO2. Это вино с молодым, легким и фруктовым характером, с акидулой во рту и довольно свежим. Очень уравновешенный. Прекрасно сочетается с блюдами из морепродуктов и рыбой, пастой и салатами.'),
(2, 'en', 'White Wine', 'Lighter than red wine and full of different flavors. Often high in acidity, white wine differs from red wine due to the lack of tannins. In general, white wine is talked about in terms of richness. Also, white wine does not age well, with a few notable exceptions.  While the grapes that produce red wine are purple and/or black, white wine is produced from either light yellow-green grapes, or light red grapes. In order to keep the acidity and light fruit flavors crisp and refreshing, white wine should be stored at 12-15 degrees, while sweet white wines should be kept at 10-11 degrees. It is best to serve whites in a thinner glass than those used for red wine.'),
(2, 'pt', 'Vinho Branco', 'Mais leve que o vinho tinto e repleto de sabores diferentes. Frequentemente rico em acidez, o vinho branco difere do vinho tinto devido à falta de taninos. Em geral, o vinho branco é falado em termos de riqueza. Além disso, o vinho branco não envelhece bem, com algumas exceções notáveis. Enquanto as uvas que produzem vinho tinto são roxas e / ou pretas, o vinho branco é produzido a partir de uvas verde-amarelo claras ou de uvas vermelhas claras. Para manter a acidez e os sabores de frutas leves crocantes e refrescantes, o vinho branco deve ser armazenado a 12-15 graus, enquanto os vinhos brancos doces devem ser mantidos a 10-11 graus. É melhor servir os brancos em um copo mais fino do que os usados ​​para o vinho tinto.'),
(2, 'ru', 'Белое вино', 'Легче красного вина и насыщен разными вкусами. Белое вино с высокой кислотностью отличается от красного из-за отсутствия танинов. В целом о белом вине говорят с точки зрения насыщенности. Кроме того, белое вино плохо выдерживается, за некоторыми заметными исключениями. В то время как виноград, из которого производят красное вино, бывает пурпурным и / или черным, белое вино получают из светло-желто-зеленого или светло-красного винограда. Чтобы кислотность и легкий фруктовый вкус оставались свежими и освежающими, белое вино следует хранить при температуре 12-15 градусов, а сладкие белые вина - при 10-11 градусах. Лучше всего подавать белые в более тонком стакане, чем те, которые используются для красного вина.'),
(3, 'en', 'Port Wine', 'Port is a sweet, red, fortified wine from Portugal. Port wine is most commonly enjoyed as a dessert wine because of its richness.  There are several styles of Port, including red, white, rosé, and an aged style called Tawny Port. Port should be served just below room temperature, around 16 degrees. Port wine pairs wonderfully with richly flavored cheeses (including blue cheese and washed-rind cheeses), chocolate and caramel desserts, salted and smoked nuts, and even sweet-smoky meats (barbecue anyone?).'),
(3, 'pt', 'Vinho do Porto', 'O Porto é um vinho doce, tinto e fortificado de Portugal. O vinho do Porto é mais comumente apreciado como vinho de sobremesa devido à sua riqueza. Existem vários estilos de Porto, incluindo tinto, branco, rosé e um estilo envelhecido chamado Porto Tawny. O Porto deve ser servido logo abaixo da temperatura ambiente, cerca de 16 graus. O vinho do Porto combina maravilhosamente com queijos de sabor rico (incluindo queijo azul e queijos de casca lavada), sobremesas de chocolate e caramelo, nozes salgadas e fumadas e até carnes doces com fumo (churrasco, alguém?).'),
(3, 'ru', 'Портвейн', 'Портвейн - сладкое красное крепленое вино из Португалии. Портвейн чаще всего употребляют в качестве десертного вина из-за его насыщенности. Есть несколько стилей портвейна, в том числе красный, белый, розовое и выдержанный стиль под названием Тони Порт. Портвейн следует подавать при температуре чуть ниже комнатной, около 16 градусов. Портвейн великолепно сочетается с богато ароматными сырами (включая сыр с плесенью и сыры с промытой коркой), шоколадными и карамельными десертами, солеными и копчеными орехами и даже с сладко-копченым мясом (кому-нибудь барбекю?).'),
(4, 'en', 'Rose Wine', 'Rosé is a type of wine made from red wine grapes, produced in a similar manner to red wine, but with reduced time fermenting with grape skins. Rosé gets its distinct pink color through a production process known as maceration, the most common way to make pink wine. Rosé resembles the flavor profile of a light red wine, but with brighter and crisper tasting notes. Rosé wines can be either sweet or dry, but tend to be on the dry side overall. Rosé should always be chilled and served at approximately 10 to 15 degrees. The two most common wine glasses for serving rosé are a stemmed glass with a short bowl and slight taper or a stemmed glass with a short bowl and a slightly flared lip. '),
(4, 'pt', 'Vinho Rose', 'Rosé é um tipo de vinho elaborado a partir de uvas tintas, produzido de forma semelhante ao vinho tinto, mas com reduzido tempo de fermentação com as cascas das uvas. O rosé obtém sua distinta cor rosa por meio de um processo de produção conhecido como maceração, a forma mais comum de fazer vinho rosa. Rosé assemelha-se ao perfil de sabor de um vinho tinto leve, mas com notas de degustação mais brilhantes e nítidas. Os vinhos rosés podem ser doces ou secos, mas tendem a ser do lado seco em geral. Rosé deve ser sempre gelado e servido a cerca de 10 a 15 graus. As duas taças de vinho mais comuns para servir rosé são uma taça de haste com uma tigela curta e ligeiramente afunilada ou uma taça de haste com uma tigela curta e uma borda ligeiramente alargada.'),
(4, 'ru', 'Розовое вино', 'Розовое вино изготовлено из красного винограда, производимого аналогично красному вину, но с сокращенным временем ферментации с виноградной кожицей. Розовое вино приобретает отчетливый розовый цвет благодаря процессу, известному как мацерация, наиболее распространенный способ изготовления розового вина. Розовое вино по вкусу напоминает легкое красное вино, но с более яркими и четкими вкусовыми нотками. Розовые вина могут быть как сладкими, так и сухими, но в целом они, как правило, сухие. Розе всегда нужно охлаждать и подавать при температуре примерно от 10 до 15 градусов. Два самых распространенных бокала для розового вина - это бокал на ножке с короткой миской и небольшой конусом или бокал на ножке с короткой миской и слегка расширенной губой.'),
(5, 'en', 'Red Wine', 'Red wine is heavier than white wine, although it does not always contain more alcohol.  Red wine in moderation is good for health. Red wines contain tannins, which provide the characteristic bitter flavor. The more tannins, the more bitter the wine. The tannins serve as a natural preservative, which explains why red wine ages so well and can be stored for many years without spoiling. Red wines are best served in a thicker glass with a wide bowl to allow the wine to breathe before drinking. It is best to store reds at 15-18 degrees.'),
(5, 'pt', 'Vinho Tinto', 'O vinho tinto é mais pesado que o vinho branco, embora nem sempre contenha mais álcool. Vinho tinto com moderação é bom para a saúde. Os vinhos tintos contêm taninos, que proporcionam o sabor amargo característico. Quanto mais taninos, mais amargo é o vinho. Os taninos servem como conservantes naturais, o que explica porque o vinho tinto envelhece tão bem e pode ser guardado muitos anos sem se estragar. Os vinhos tintos são melhor servidos em um copo mais grosso com uma tigela grande para permitir que o vinho respire antes de beber. É melhor armazenar os tintos a 15-18 graus.'),
(5, 'ru', 'Красное вино', 'Красное вино тяжелее белого, хотя не всегда содержит больше алкоголя. Красное вино в умеренных количествах полезно для здоровья. Красные вина содержат танины, которые придают характерный горький вкус. Чем больше танинов, тем более горькое вино. Танины служат естественным консервантом, что объясняет, почему красное вино так хорошо выдерживается и может храниться в течение многих лет без порчи. Красные вина лучше всего подавать в более толстом стакане с широкой чашей, чтобы вино дышало перед употреблением. Красные лучше всего хранить при температуре 15-18 градусов.'),
(6, 'en', 'Vinho Verde', 'Vinho Verde, produced in the Demarcated Region of Vinhos Verdes, in Portugal, is a denomination of controlled origin whose demarcation dates back to 1908. Vinho Verde is unique in the world. Naturally light and fresh, produced in the province of Minho, in the north-west of Portugal, a geographically well-located coastal region for the production of excellent white wines. Vinho Verde is a fruity wine, easy to drink, good as an aperitif or in harmony with light and balanced meals: salads, fish, seafood, white meat, tapas, sushi, sashimi and others.'),
(6, 'pt', 'Vinho Verde', 'O Vinho Verde, produzido na Região Demarcada dos Vinhos Verdes, em Portugal, é uma denominação de origem controlada cuja demarcação remonta a 1908. O Vinho Verde é único no mundo. Naturalmente leve e fresco, é produzido na província do Minho, no noroeste de Portugal, uma região costeira geograficamente bem localizada para a produção de excelentes vinhos brancos. O Vinho Verde é um vinho frutado, fácil de beber, bom como aperitivo ou em harmonia com refeições ligeiras e equilibradas: saladas, peixes, mariscos, carnes brancas, tapas, sushi, sashimi e outros.'),
(6, 'ru', 'Vinho Verde', 'Винью Верде, произведенный в Демаркированном регионе Виньюш Верде, в Португалии, является наименованием контролируемого происхождения, демаркация которого восходит к 1908 году. Винью Верде является уникальным в мире. Естественно легкое и свежее, произведено в провинции Минью, на северо-западе Португалии, в географически удачно расположенном прибрежном регионе для производства превосходных белых вин. Винью Верде - фруктовое вино, легко пьющееся, хорошее в качестве аперитива или гармоничное с легкими и сбалансированными блюдами: салатами, рыбой, морепродуктами, белым мясом, тапас, суши, сашими и другими.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `anexo` varchar(500) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `foto`, `anexo`, `is_active`) VALUES
(1, 'Caves Messias', 'CavesMessias.jpg', 'CavesMessias.pdf', 1),
(2, 'Adega de Palmela', 'AdegaDaPalmela.jpg', 'AdegaDaPalmela.pdf', 1),
(3, 'Adega de Azueira', 'AdegaDeAzueira.jpg', 'AdegaDeAzueira.pdf', 1),
(4, 'Caves da Montanha', 'CavesDaMontanha.jpg', 'CavesDaMontanha.pdf', 1),
(5, 'Marcolino Sebo', 'MarcolinoSebo.jpg', 'MarcolinoSebo.pdf', 1),
(6, 'Casa Fonte Pequena', 'CasaFontePequena.jpg', 'CasaFontePequena.pdf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`id`, `texto`, `tipo`, `is_active`) VALUES
(4, '+351 913 891 580', 'telemóvel', 1),
(5, 'geral@portwinestyle.pt', 'email', 1),
(6, 'Rua Prof. Urbano de Moura, 298 5º - 53\r\n4400-258 Vila Nova de Gaia', 'morada', 1),
(7, 'https://www.facebook.com/portwinestyle', 'facebook', 1),
(8, 'https://www.instagram.com/vdipatov/', 'instagram', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

CREATE TABLE `contratos` (
  `id` int(11) NOT NULL,
  `anexo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `subject` text NOT NULL,
  `to_email` varchar(150) NOT NULL,
  `from_email` varchar(150) NOT NULL,
  `sent_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emails`
--

INSERT INTO `emails` (`id`, `title`, `subject`, `to_email`, `from_email`, `sent_at`) VALUES
(7, 'Alexandra Ipatova', 'Sou um utilizador a mandar uma mensagem de contacto ao administrador', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-05 16:22:45'),
(8, 'Alexandra Ipatova', 'Sou um utilizador a mandar uma mensagem de contacto ao administrador', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-05 16:23:01'),
(9, 'Alexandra Ipatova', 'teste1', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-05 16:23:45'),
(10, 'Alexandra Ipatova', 'teste2', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-05 16:23:58'),
(11, 'Alexandra Ipatova', 'teste3', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-05 16:24:26'),
(12, 'Alexandra Ipatova', 'teste4', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-05 16:25:32'),
(13, 'Alexandra Ipatova', 'ooga booga teste teste', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-06 09:14:04'),
(14, '', '', 'KaraSenshi@protonmail.com', '', '2021-04-06 12:27:08'),
(15, 'Inscreveu-se no newsletter!', 'Obrigada por se ter inscrito no nosso newletter! Receberá para este email notificações da empresa.', 'KaraSenshi@protonmail.com', 'KaraSenshi@protonmail.com', '2021-04-06 13:34:43'),
(16, 'Inscreveu-se no newsletter!', 'Obrigada por se ter inscrito no nosso newletter! Receberá para este email notificações da empresa.', 'KaraSenshi@protonmail.com', 'KaraSenshi@protonmail.com', '2021-04-06 13:35:48'),
(17, 'Inscreveu-se no newsletter!', 'Obrigada por se ter inscrito no nosso newletter! Receberá para este email notificações da empresa.', 'KaraSenshi@protonmail.com', 'KaraSenshi@protonmail.com', '2021-04-06 13:42:10'),
(18, 'Inscreveu-se no newsletter!', 'Obrigada por se ter inscrito no nosso newletter! Receberá para este email notificações da empresa.', 'KaraSenshi@protonmail.com', 'KaraSenshi@protonmail.com', '2021-04-06 13:42:18'),
(19, 'Alexandra Ipatova', 'ooga booga it work?', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-09 14:39:49'),
(20, 'Alexandra Ipatova', 'zesxdrcfgvbhjnkml,', 'KaraSenshi@protonmail.com', 'ialexandra2003@gmail.com', '2021-04-09 14:59:55'),
(21, 'Inscreveu-se no newsletter!', 'Obrigada por se ter inscrito no nosso newletter! Receberá para este email notificações da empresa.', 'ialexa@gmail.com', 'KaraSenshi@protonmail.com', '2021-04-12 13:32:12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails_newsletter`
--

CREATE TABLE `emails_newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `emails_newsletter`
--

INSERT INTO `emails_newsletter` (`id`, `email`) VALUES
(1, 'KaraSenshi@protonmail.com'),
(2, 'ialexa@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE `encomendas` (
  `id` int(11) NOT NULL,
  `data_hora` datetime NOT NULL,
  `id_utilizador` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`id`, `data_hora`, `id_utilizador`, `is_active`) VALUES
(1, '2021-03-18 15:34:06', 6, 1),
(25, '2021-03-29 16:05:21', 5, 1),
(26, '2021-04-06 09:15:29', 5, 1),
(27, '2021-04-20 10:45:14', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `footer`
--

INSERT INTO `footer` (`id`, `texto`, `tipo`, `is_active`) VALUES
(4, 'A PORT LINE. is a Portuguese company that exports Portuguese products to the Russian market.', 'descrição', 1),
(6, 'footer-bg.jpg', 'foto', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhas_encomenda`
--

CREATE TABLE `linhas_encomenda` (
  `id_produto` int(11) NOT NULL,
  `id_encomenda` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `linhas_encomenda`
--

INSERT INTO `linhas_encomenda` (`id_produto`, `id_encomenda`, `quantidade`, `id_contrato`, `estado`) VALUES
(1, 1, 100, NULL, 2),
(1, 27, NULL, NULL, 1),
(2, 1, 200, 1, 1),
(2, 25, NULL, NULL, 1),
(2, 26, NULL, NULL, 1),
(3, 27, NULL, NULL, 1),
(8, 25, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens_newsletter`
--

CREATE TABLE `mensagens_newsletter` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `mensagem` text NOT NULL,
  `sent_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `route` varchar(70) NOT NULL,
  `pai` int(2) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `route`, `pai`, `is_active`) VALUES
(1, 'home.php', 0, 1),
(2, 'produtos.php?id=&keyword=&page=1', 0, 1),
(3, 'parceiros.php', 0, 1),
(4, 'clientes.php', 0, 1),
(5, 'sobrenos.php', 0, 1),
(6, 'contactos.php', 0, 1),
(7, 'produtos.php?id=1&keyword=&page=1', 2, 1),
(8, 'produtos.php?id=2&keyword=&page=1', 2, 1),
(9, 'produtos.php?id=3&keyword=&page=1', 2, 1),
(10, 'produtos.php?id=4&keyword=&page=1', 2, 1),
(11, 'produtos.php?id=5&keyword=&page=1', 2, 1),
(12, 'produtos.php?id=6&keyword=&page=1', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu_idiomas`
--

CREATE TABLE `menu_idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(2) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `menu_idiomas`
--

INSERT INTO `menu_idiomas` (`id`, `idioma`, `nome`) VALUES
(1, 'en', 'Home'),
(1, 'pt', 'Home'),
(1, 'ru', 'Главная'),
(2, 'en', 'Products'),
(2, 'pt', 'Produtos'),
(2, 'ru', 'продукты'),
(3, 'en', 'Partners'),
(3, 'pt', 'Parceiros'),
(3, 'ru', 'партнеры'),
(4, 'en', 'Clients'),
(4, 'pt', 'Clientes'),
(4, 'ru', 'клиенты'),
(5, 'en', 'About'),
(5, 'pt', 'Sobre'),
(5, 'ru', 'о нас'),
(6, 'en', 'Contacts'),
(6, 'pt', 'Contactos'),
(6, 'ru', 'контакты'),
(7, 'en', 'Sparkling Wines'),
(7, 'pt', 'Espumantes'),
(7, 'ru', 'Игристые вина'),
(8, 'en', 'White Wine'),
(8, 'pt', 'Vinho Branco'),
(8, 'ru', 'Белое вино'),
(9, 'en', 'Port Wine'),
(9, 'pt', 'Vinho do Porto'),
(9, 'ru', 'Портвейн'),
(10, 'en', 'Rose Wine'),
(10, 'pt', 'Vinho Rose'),
(10, 'ru', 'Розовое вино'),
(11, 'en', 'Red Wine'),
(11, 'pt', 'Vinho Tinto'),
(11, 'ru', 'Красное вино'),
(12, 'en', 'Vinho Verde'),
(12, 'pt', 'Vinho Verde'),
(12, 'ru', 'Vinho Verde');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `route` varchar(150) NOT NULL,
  `foto` varchar(70) DEFAULT NULL,
  `foto_pos` varchar(10) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`id`, `nome`, `route`, `foto`, `foto_pos`, `is_active`) VALUES
(1, 'quemsomos', 'sobrenos.php', 'brasao.png', 'right', 1),
(2, 'produção', 'sobrenos.php', NULL, 'center', 1),
(3, 'mundial', 'sobrenos.php', 'mapa.jpg', 'center', 1),
(4, 'pergunta1', 'FAQ.php', NULL, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas_idiomas`
--

CREATE TABLE `paginas_idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(2) NOT NULL,
  `titulo` varchar(70) DEFAULT NULL,
  `subtitulo` varchar(250) DEFAULT NULL,
  `texto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `paginas_idiomas`
--

INSERT INTO `paginas_idiomas` (`id`, `idioma`, `titulo`, `subtitulo`, `texto`) VALUES
(1, 'en', 'Who are we and our goals', 'About Portline', 'Port Line - Union Winemakers of Portugal have a full range of wines from all winemaking regions of Portugal selected specifically for the Russian market with the best price-quality ratio.\r\nWe provide for your consideration a part of the wines of the producers of our Union according to the interest shown by you.\r\n'),
(1, 'pt', 'Quem somos e os nossos objetivos', 'Sobre a Portline', 'A Port Line - Union Winemakers of Portugal dispõe de uma gama completa de vinhos de todas as regiões vitivinícolas de Portugal selecionados especificamente para o mercado Russo com a melhor relação qualidade-preço. Colocamos à sua disposição uma parte dos vinhos dos produtores da nossa União de acordo com o interesse por si demonstrado.'),
(1, 'ru', 'Кто мы и наши цели', 'О Portline', 'Port Line - Union Winemakers of Portugal предлагает полный ассортимент вин из всех винодельческих регионов Португалии, отобранных специально для российского рынка с наилучшим соотношением цены и качества.\r\nПредоставляем на ваше рассмотрение часть вин производителей нашего Союза в соответствии с проявленным вами интересом.'),
(2, 'en', 'Production', 'Capacities and characteristics', '- bottling lines, - has 25 bottling lines + 4 tetrapack + 8 BIB\r\n- capacity of production, - 100 million bottles per year\r\n- product assortment, - produces all types of wines from several regions in Portugal.\r\n- turnover per year in bottles, 100 million bottles, 180 million euros\r\n- certification, - From several regions, we export to more than 53 countries so we are used to it\r\n- designs, - we have our own designers but we also accept designers of our customers\r\n- Turnover 2018 in bottles – 100 million bottles\r\n- Turnover 2019 in bottles (forecast) – 110 million bottles\r\n'),
(2, 'pt', 'Produção', 'Capacidades e características', '- linhas de engarrafamento, - tem 25 linhas de engarrafamento + 4 tetrapack + 8 BIB\r\n- capacidade de produção, - 100 milhões de garrafas por ano\r\n- sortimento de produtos, - produz todos os tipos de vinhos de várias regiões de Portugal.\r\n- faturamento por ano em garrafas, 100 milhões de garrafas, 180 milhões de euros\r\n- certificação, - De várias regiões, exportamos para mais de 53 países, por isso estamos acostumados\r\n- designs, - temos nossos próprios designers, mas também aceitamos designers de nossos clientes\r\n- Volume de negócios 2018 em garrafas - 100 milhões de garrafas\r\n- Volume de negócios 2019 em garrafas (previsão) - 110 milhões de garrafas\r\n'),
(2, 'ru', 'Производство', 'Емкости и характеристики', '- линии розлива, - имеет 25 линий розлива + 4 тетрапака + 8 BIB\r\n- мощность производства, - 100 млн бутылок в год\r\n- ассортимент продукции, - производит все виды вин из нескольких регионов Португалии.\r\n- годовой оборот в бутылках, 100 млн бутылок, 180 млн евро\r\n- сертификация, - из нескольких регионов мы экспортируем в более чем 53 страны, поэтому мы привыкли к этому\r\n- дизайн, - у нас есть собственные дизайнеры, но мы также принимаем дизайнеров наших клиентов\r\n- Оборот 2018 в бутылках - 100 млн бутылок\r\n- Оборот 2019 в бутылках (прогноз) - 110 млн бутылок'),
(3, 'en', 'Our presence in the world', NULL, NULL),
(3, 'pt', 'A nossa presença no mundo', NULL, NULL),
(3, 'ru', 'Наше присутствие в мире', NULL, NULL),
(4, 'en', NULL, 'EN Pergunta 1', 'EN Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec lectus et neque faucibus molestie feugiat a eros. Vestibulum malesuada aliquam purus sed volutpat. Curabitur magna lectus, feugiat elementum mollis vel, imperdiet vel nisi. Fusce urna urna, dictum id fermentum eget, lacinia ac orci. Fusce fermentum ex vitae orci aliquet, et consequat nibh semper. Nulla at iaculis diam, ac blandit risus. Quisque odio massa, consequat eu ornare vel, ultrices vitae elit. Ut a aliquam odio. Aenean quis metus vel mauris porttitor rhoncus. Donec volutpat venenatis est.'),
(4, 'pt', NULL, 'PT Pergunta 1', 'PT Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec lectus et neque faucibus molestie feugiat a eros. Vestibulum malesuada aliquam purus sed volutpat. Curabitur magna lectus, feugiat elementum mollis vel, imperdiet vel nisi. Fusce urna urna, dictum id fermentum eget, lacinia ac orci. Fusce fermentum ex vitae orci aliquet, et consequat nibh semper. Nulla at iaculis diam, ac blandit risus. Quisque odio massa, consequat eu ornare vel, ultrices vitae elit. Ut a aliquam odio. Aenean quis metus vel mauris porttitor rhoncus. Donec volutpat venenatis est.'),
(4, 'ru', NULL, 'RU Pergunta 1', 'RU Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec lectus et neque faucibus molestie feugiat a eros. Vestibulum malesuada aliquam purus sed volutpat. Curabitur magna lectus, feugiat elementum mollis vel, imperdiet vel nisi. Fusce urna urna, dictum id fermentum eget, lacinia ac orci. Fusce fermentum ex vitae orci aliquet, et consequat nibh semper. Nulla at iaculis diam, ac blandit risus. Quisque odio massa, consequat eu ornare vel, ultrices vitae elit. Ut a aliquam odio. Aenean quis metus vel mauris porttitor rhoncus. Donec volutpat venenatis est.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `parceiros`
--

CREATE TABLE `parceiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `anexo` varchar(500) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `parceiros`
--

INSERT INTO `parceiros` (`id`, `nome`, `foto`, `anexo`, `is_active`) VALUES
(1, 'Caves Messias', 'CavesMessias.jpg', 'CavesMessias.pdf', 1),
(2, 'Adega de Palmela', 'AdegaDaPalmela.jpg', 'AdegaDaPalmela.pdf', 1),
(3, 'Adega de Azueira', 'AdegaDeAzueira.jpg', 'AdegaDeAzueira.pdf', 1),
(4, 'Caves da Montanha', 'CavesDaMontanha.jpg', 'CavesDaMontanha.pdf', 1),
(5, 'Marcolino Sebo', 'MarcolinoSebo.jpg', 'MarcolinoSebo.pdf', 1),
(6, 'Casa Fonte Pequena', 'CasaFontePequena.jpg', 'CasaFontePequena.pdf', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `selector` char(16) DEFAULT NULL,
  `token` char(64) DEFAULT NULL,
  `expires` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `ano_colheita` int(4) DEFAULT NULL,
  `castas` varchar(200) DEFAULT NULL,
  `graduacao_alcoolica` varchar(10) DEFAULT NULL,
  `acidez` varchar(15) DEFAULT NULL,
  `acucar` varchar(15) DEFAULT NULL,
  `temperatura_consumo` varchar(50) DEFAULT NULL,
  `n_likes` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `foto`, `ano_colheita`, `castas`, `graduacao_alcoolica`, `acidez`, `acucar`, `temperatura_consumo`, `n_likes`, `views`, `id_categoria`, `is_active`) VALUES
(1, 'Porto1964.jpg', 1964, 'Touriga Nacional; Touriga Franca; Tinta Barroca; Tinta Roriz; Tinto Cão', '20,0 % vol', '5,55 g/l', '125,0 g/l', '10-12 ºC', 2, 3, 3, 1),
(2, 'MontedaVaqueiraRose.jpg', 2019, 'Aragonez;Touriga Nacional', '12,5% vol.', '5,1 g/l', '0,2 g', '10-12 ºC', 2, 3, 4, 1),
(3, 'PortoMessias10anos.png', NULL, 'Touriga Nacional; Touriga Franca; Tinto Cão; Tinta Roriz; Tinta Barroca', '20,0 % vol', '4,08 g/l', '113,0 g/l', '10-12 ºC', 2, 3, 3, 1),
(4, 'ValdoeiroChardonnay.jpg', 2015, 'Chardonnay, Pinot Noir.', '12,5% vol.', '6,2 g/l', '1,3 g/l', '8ºC', 1, 27, 1, 1),
(5, 'MontanhaICE.png', NULL, 'Malvazia Fina; Baga; Bical; Fernão Pires', '12 % vol', NULL, NULL, '5ºC - ICED', 1, 0, 1, 1),
(6, 'MessiasDouroBranco.png', 2019, 'Malvasia Fina; Rabigato', '12,0 % vol', '6,2 g/l', '0,6 g/l', '10 ºC-12 ºC', 1, 2, 2, 1),
(7, 'BairradaMessiasTinto.png', 2014, 'Touriga Nacional; Baga', '12,0 % vol', '6,6 g/l ', '2,9 g/l', '16-18 ºC', 0, 2, 5, 1),
(8, 'MareAlta.png', NULL, 'Castas tradicionais da Região  dos Vinhos Verdes, com predominância da casta Loreiro', '10,0 % vol', '6,4 g/l', '12,0 g/l', '8-12 °C', 9, 24, 6, 1),
(9, 'MessiasRed.png', 2016, 'Touriga Nacional; Touriga Franca; Tinta Roriz; Tinta Barroca', '12,5 % vol', '5,2 g/l ', '2,8 g/l', '16-18 ºC', 2, 4, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_idiomas`
--

CREATE TABLE `produtos_idiomas` (
  `id` int(11) NOT NULL,
  `idioma` varchar(2) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `produtor` varchar(150) DEFAULT NULL,
  `cor` varchar(100) DEFAULT NULL,
  `designacao_origem` varchar(150) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `regiao` varchar(150) DEFAULT NULL,
  `solo` varchar(50) DEFAULT NULL,
  `processo_vinificacao` text,
  `notas_prova` text,
  `info_adicional` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_idiomas`
--

INSERT INTO `produtos_idiomas` (`id`, `idioma`, `nome`, `produtor`, `cor`, `designacao_origem`, `pais`, `regiao`, `solo`, `processo_vinificacao`, `notas_prova`, `info_adicional`) VALUES
(0, 'ru', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, 'en', 'Messias Colheita 1964', 'Soc. Agric. Com. Vinhos Messias, SA', 'Intense amber', 'Douro', 'Portugal', 'Douro', 'Schistose', 'Partial de-stemming and controlled fermentation at 24/28º.C., when must reaches the desired sugar level, fermentation is then interrupted by the addiction of brandy (77%), followed by a minimum maturation period of seven years, in oak wood casks till bottling in our warehouses in Vila Nova de Gaia.', 'Wine with amber color with greenish hints, the aroma has dried fruit and balsamic notes, the palate is intense and well balanced.', NULL),
(1, 'pt', 'Porto Messias Colheita 1964', 'Soc. Agric. Com. Vinhos Messias, SA', 'Âmbar intensa', 'Douro', 'Portugal', 'Douro', 'Xisto', 'Desengace parcial e fermentação controlada a 24 / 28º.C., Quando o mosto atinge o teor de açúcar pretendido, a fermentação é interrompida com adição de aguardente (77%), seguida de um período mínimo de maturação de sete anos, em madeira de carvalho pipas até ao engarrafamento nos nossos armazéns em Vila Nova de Gaia.', 'Um vinho tawny claro, com reflexos verdes. Evolução bastante boa e complexa dos aromas terciários; Boa madeira e um sortido de especiarias que combinam numa sinfonia afinada com os aromas a “vinagrinho”, agridoce agradável. Na boca é encorpado e untuoso confirmando todas as boas sensações que emergem no nariz, combinando com um poderoso nariz interno e um longo e delicioso final de boca.\r\n\r\nBebido sozinho, é um digestivo por excelência, mas também combina perfeitamente com sobremesas como, um crumble de maçã com canela, um sorbet de melão com frutos vermelhos, palitos de amêndoa e porque não com um bom Queijo de Alentejo ou Azeitão.', NULL),
(1, 'ru', 'Port Messias Colheitas 1964', 'Soc. Agric. Com. Vinhos Messias, SA', 'насыщенный янтарь', '\r\nДору', '\r\nПортугалия', '\r\nДору', 'Сланец', 'Частичное удаление стеблей и контролируемая ферментация при 24 / 28ºC., Когда сусло достигает желаемого уровня сахара, ферментация затем прерывается пристрастием к бренди (77%) с последующим минимальным периодом созревания в семь лет в дубовой древесине. бочки до розлива на наших складах в Вила-Нова-де-Гайя.', 'Вино янтарного цвета с зеленоватыми оттенками, в аромате сухофрукты и бальзамические нотки, вкус насыщенный и хорошо сбалансированный.', NULL),
(2, 'en', 'Monte da Vaqueira Rosé', 'Engenheiro Jorge Santos', 'vibrant pink color', 'Regional Alentejano', 'Portugal', 'Alentejo', 'Argillaceous-Schist', 'Through the “Bica Aberta” process\r\nwith temperature control.', 'Aroma: Complex aroma of red fruits and wild flowers.\r\nFlavor: Fruity, fresh, slightly acidic, full-bodied with good persistence.\r\nAccompaniment: Ideal to take as an aperitif or accompany some grilled or seafood.', NULL),
(2, 'pt', 'Monte da Vaqueira Rosé', 'Engenheiro Jorge Santos', 'Cor rosada viva', 'Regional Alentejano', 'Portugal', 'Alentejo', 'Argilo-Xistoso', 'Pelo processo de “Bica Aberta” com controlo de temperatura.', 'Aroma: Aroma complexo de frutos vermelhos e flores silvestres.\r\nSabor: Sabor frutado, fresco, ligeiramente acídulo, encorpado com boa persistência.\r\nAcompanhamento: Ideal para tomar como aperitivo ou acompanhar alguns grelhados ou mariscos.', NULL),
(2, 'ru', 'Монте да Вакейра Розе', '\r\nИнженер Хорхе Сантос', '\r\nЯркий розовый цвет', 'Региональный Алентежу', '\r\nПортугалия', 'Алентежу', ' Глинисто-сланцевый', 'Через процесс «Bica Aberta»\r\nс контролем температуры.', 'Аромат: Сложный аромат красных фруктов и полевых цветов.\r\nВкус: Фруктовый, свежий, слегка кислый, насыщенный, с хорошей стойкостью.\r\nСопровождение: идеально подходит в качестве аперитива или к блюдам, приготовленным на гриле, или к морепродуктам.', NULL),
(3, 'en', 'Porto Messias 10 Years Old', 'Soc. Agric. Com. Vinhos Messias, SA', 'Orange', NULL, 'Portugal', 'Demarcada do Douro', 'Schistose', 'Fermentation interrupted by the addition of brandy. Ageing in cask during 10 Years until bottling.', 'Tawny colour. Rich and complex aroma, with notes of dry fruits. Velvety and full at taste, retaining a pleasant freshness. Long final.', NULL),
(3, 'pt', 'Porto Messias 10 Anos', 'Soc. Agric. Com. Vinhos Messias, SA', 'Laranja', NULL, 'Portugal', 'Demarcada do Douro', 'Xistoso', 'Fermentação Alcoólica interrompida pela adição de aguardente, lote envelhecido em madeira cerca de 10 Anos até ser engarrafado.', 'Vinho alourado com bons aromas de madeira suave e com algumas especiarias. Na boca é agradável sente-se o bouquet da madeira e as especiarias. Provoca um bom toque rectronasal e tem um final de boca bom e prolongado.', NULL),
(3, 'ru', 'Messias 10 Лет', 'Soc. Agric. Com. Vinhos Messias, SA', 'оранжевый цвет', NULL, 'Португалия', 'Отмечен от Дору', 'Шистоз', 'Алкогольное брожение прерывается добавлением бренди, замес выдерживается в древесине около 10 лет до розлива в бутылки.', 'Коричневое вино с приятным ароматом мягкой древесины и некоторых специй. Букет дерева и специй приятен во рту. Он вызывает хорошее прямокишечно-носовое прикосновение и имеет хорошее долгое послевкусие.', NULL),
(4, 'en', 'Quinta do Valdoeiro Baga Chardonnay Bruto', 'Soc. Agric. Com. Vinhos Messias, SA', 'Pretty pale pink', NULL, 'Portugal', 'Bairrada', ' Limestone clay', 'Careful selection of grapes grown at Quinta do Valdoeiro Estate. Light pressing of the all of the grapes. Fermentation in steel vats under controlled temperature. Second fermentation in bottle according to the traditional method. Long maturation “sur lees” in order to attain better complexity and excellence. ', 'Pale greyish/pink colour indicting a red grape in its composition. Aroma with strong shades of red fruit and hints of baking. This fine bubble and sparse effervescence sparkling wine, denotes a mouth feeling of a delicate mousse, a smooth stimulus, remembering cherries, strawberries and biscuit.\r\nCrispy acidity, conveying lightness in the aftertaste. ', NULL),
(4, 'pt', 'Quinta do Valdoeiro Baga Chardonnay Bruto', 'Soc. Agric. Com. Vinhos Messias, SA', 'Rosa bastante pálido', NULL, 'Portugal', 'Bairrada', 'Argilo-calcário', 'Criteriosa seleção de uvas da Quinta do Valdoeiro. Desengace total. Fermentação em cubas de inox a temperatura controlada. Segunda fermentação em garrafa de acordo com o método tradicional. Estágio “sur lees” prolongado para atingir maior complexidade e excelência.', 'Cor rosa bastante pálida, denunciando veladamente um vinho base feito com uvas tintas. Bolha média formando um cordão persistente. Aroma intenso, com frutos vermelhos frescos são envolvidos por nuances de panificação e notas de fermento. Boca pautada por uma acidez refrescante que se equilibra pela suavidade da mousse. Longo no final de prova.', NULL),
(4, 'ru', 'Quinta do Valdoeiro Baga Chardonnay Bruto', 'Soc. Agric. Com. Vinhos Messias, SA', 'Довольно бледно-розовый', NULL, 'Португалия', 'Байррада', 'Известняковая глина', 'Тщательный отбор винограда из Quinta do Valdoeiro. Полное удаление стеблей. Ферментация в чанах из нержавеющей стали при контролируемой температуре. Ферментация во второй бутылке традиционным методом. Продолжительный этап «Sur lees» для достижения большей сложности и совершенства.', 'Очень бледно-розовый цвет, категорически противодействующий базовому вину, сделанному из красного винограда. Средний пузырек, образующий стойкий шнур. Насыщенный аромат свежих красных фруктов окружен нюансами выпечки и дрожжевыми нотками. Освежающая кислотность во рту уравновешивается мягкостью мусса. Долго в конце гонки.', NULL),
(5, 'en', 'Montanha ICE', 'Caves da Montanha', 'Golden', NULL, 'Portugal', 'Bairrada', ' Limestone / Sandy', 'Using the traditional method of 2nd fermentation in bottle, and 12 months in the cellar before \"degorgement\", at a temperature between 14 and 17ºC.', 'In its tasting, this sparkling wine has a shiny appearance, golden color, fine and persistent bubble, with an intense aroma of tropical fruit and light citrus notes, sweet and creamy flavor with a refreshing finish! It can also be enjoyed simply on a flute, as an aperitif or accompanying tapas or seafood and light meals such as salads and fruits.', NULL),
(5, 'pt', 'Montanha ICE', 'Caves da Montanha', 'Dourada', '', 'Portugal', 'Bairrada', 'Argilo-calcário/Arenoso', 'Utilizando o método tradicional de 2ª fermentação em garrafa, e estágio de 12 meses em cave antes do “degorgement”, a uma temperatura entre os 14 e 17ºC.', 'Na sua prova, este espumante apresenta um aspeto brilhante, cor Dourada, bolha fina e persistente, com um aroma intenso a fruta tropical e ligeiras notas cítricas, sabor doce e cremoso com um final refrescante! Pode ainda ser apreciado simples num flute, como aperitivo ou acompanhando umas tapas ou mariscos e refeições leves como saladas e frutas. ', NULL),
(5, 'ru', 'Montanha ICE', 'Caves da Montanha', 'Золотой', NULL, 'Португалия', 'Байррада', 'Известняк / Песчаный', 'Используя традиционный метод 2-го брожения в бутылке и 12 месяцев в погребе перед «дегазированием», при температуре от 14 до 17ºC.', 'На вкус это игристое вино имеет сияющий вид, золотистый цвет, тонкий и стойкий пузырь, с интенсивным ароматом тропических фруктов и легкими цитрусовыми нотами, сладким и сливочным вкусом с освежающим послевкусием! Его также можно подавать просто на флейте в качестве аперитива или в качестве сопровождения тапас, морепродуктов и легких блюд, таких как салаты и фрукты.', NULL),
(6, 'en', 'Douro Messias Selection Branco 2019', 'Soc. Agric. Com. Vinhos Messias, SA', 'Pale yellow', NULL, 'Portugal', 'Douro', 'Shale', 'Total destemming of the grape followed by gentle pressing. Fermentation at controlled temperature.', 'Bright, pale yellow in color. Intense nose, revealing white and yellow fruits reminiscent of mango and apricot. Very balanced and fresh on the palate.', NULL),
(6, 'pt', 'Douro Messias Selection Branco 2019', 'Soc. Agric. Com. Vinhos Messias, SA', 'Amarela pálida', NULL, 'Portugal', 'Douro', 'Xistoso', 'Desengaçe total da uva seguida de prensagem suave. Fermentação a temperatura controlada.', 'Brilhante, de cor amarelo pálida. Nariz intenso, revelando frutos brancos e amarelos que lembram manga e alperce. Muito equilibrado e fresco no paladar.', NULL),
(6, 'ru', 'Douro Messias Selection Branco 2019', 'Soc. Agric. Com. Vinhos Messias, SA', 'Бледно-желтый', NULL, 'Португалия', 'Дору', '', 'Полное удаление плодов винограда с последующим легким прессованием. Ферментация при контролируемой температуре.', 'Яркий, бледно-желтого цвета. Насыщенный аромат, раскрывающиеся белые и желтые фрукты, напоминающие манго и абрикос. Очень сбалансированный и свежий на вкус.', NULL),
(7, 'en', 'Bairrada Messias Selection Tinto', 'Soc. Agric. Com. Vinhos Messias, SA', 'Ruby', NULL, 'Portugal', 'Bairrada', 'Limestone clay', 'Total destemming of the grapes. Fermentation at controlled temperature. \"Cuvaison\" prolonged. Partial stage in contact with French and American oak wood.', 'Intense ruby ​​color, intense aroma with fresh red fruit surrounded by notes of spices and vegetables. Medium structured, with very ripe tannins. Long and fresh finish.', NULL),
(7, 'pt', 'Bairrada Messias Selection Tinto', 'Soc. Agric. Com. Vinhos Messias, SA', 'Rubi', NULL, 'Portugal', 'Bairrada', 'Argilo-calcário', 'Desengace total das uvas. Fermentação a temperatura controlada. “Cuvaison” prolongada. Estágio parcial em contacto com madeira de carvalho francês e americano.', 'Cor rubi intensa, aroma intenso com fruta vermelha fresca envolvida por notas de especiarias e vegetais. Medianamente estruturado, com taninos bem maduros. Final longo e fresco.', NULL),
(7, 'ru', 'Bairrada Messias Selection Tinto', 'Soc. Agric. Com. Vinhos Messias, SA', 'Рубин', NULL, 'Португалия', 'Байррада', 'Известняковая глина', 'Полное удаление плодов винограда. Ферментация при контролируемой температуре. «Кувайсон» продлен. Частичный контакт с древесиной французского и американского дуба.', 'Насыщенный рубиновый цвет, интенсивный аромат свежих красных фруктов в окружении ноток специй и овощей. Средней структуры, с очень зрелыми танинами. Послевкусие долгое и свежее.', NULL),
(8, 'en', 'Maré Alta', 'Casa Fonte Pequena', 'Citrus', NULL, 'Portugal', 'Green Wine Demarcated Region', NULL, 'Total destemming, pressing\r\npneumatics and fermentation\r\nalcoholic at low temperatures.', 'Crystalline appearance, citrus color, aroma of citrus fruits with floral nuances, refreshing and delicate flavor. With\r\nbalanced acidity.', NULL),
(8, 'pt', 'Maré Alta', 'Casa Fonte Pequena', 'Cítrica ', NULL, 'Portugal', 'Região Demarcada dos Vinhos Verdes', NULL, 'Desengace total, prensagem\r\npneumática e fermentação\r\nalcoólica a baixas temperaturas.', 'Aparência cristalina, cor cítrica, aroma a frutas cítricas com nuances florais, sabor refrescante e delicado. Com\r\numa acidez equilibrada.', NULL),
(8, 'ru', 'Maré Alta', 'Casa Fonte Pequena', 'Цитрусовые', NULL, 'Португалия', 'Территория, выделенная зеленым вином', NULL, 'Полное удаление стеблей, прессование\r\nпневматика и ферментация\r\nалкогольный при низких температурах.', 'Кристаллический вид, цвет цитрусовых, аромат цитрусовых с цветочными нюансами, освежающий и тонкий вкус. С\r\nсбалансированная кислотность.', NULL),
(9, 'en', 'Messias Selection Red', 'Soc. Agric. Com. Vinhos Messias, SA', 'Ruby', '', 'Portugal', 'Douro', 'Shale', 'Total destemming. Alcoholic fermentation took place at a constant temperature of 28ºC. Stage in brief contact with wood.', 'Very characteristic Douro wine, with very light notes of dried fruits and nuances of black and blue fruits. In the mouth it is very fresh and with good structure. Pleasant finish and high gastronomic aptitude.', NULL),
(9, 'pt', 'Messias Selection Red', 'Soc. Agric. Com. Vinhos Messias, SA', 'Rubi', NULL, 'Portugal', 'Douro', 'Xistoso', 'Desengace total. Fermentação alcoólica decorreu a uma temperatura constante de 28ºC. Estágio em contacto breve com madeira.', 'Vinho duriense muito caraterístico, onde pontuam notas muito ligeiras de frutos secos e nuances de frutos pretos e azuis. Na boca revela-se muito fresco e com boa estrutura. Final de prova agradável e de elevada aptidão gastronómica. ', NULL),
(9, 'ru', 'Messias Selection Red', 'Soc. Agric. Com. Vinhos Messias, SA', 'Рубин', NULL, 'Португалия', 'Дору', 'Сланец', 'Полное удаление стеблей. Алкогольное брожение происходило при постоянной температуре 28ºC. Стадия кратковременного контакта с деревом.\r\n', 'Полное удаление стеблей. Алкогольное брожение происходило при постоянной температуре 28ºC. Стадия кратковременного контакта с деревом.\r\n', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `endereco_juridico` varchar(250) DEFAULT NULL,
  `endereco_comercial` varchar(250) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(11) DEFAULT NULL,
  `NIF` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `username`, `password`, `nome`, `endereco_juridico`, `endereco_comercial`, `email`, `telefone`, `NIF`, `is_active`) VALUES
(5, 'Alexandra Ipatova', '$2y$10$QZ18W/MdLGu9HINLZWoVE.Z1DDwWtldyhTDhQoMleslvTsEIbwMCK', 'Alexandra Ipatova', 'Rua Professor Urbano De Moura', 'NULL', 'ialexandra2003@gmail.com', 913891580, NULL, 1),
(6, 'miau', '$2y$10$exhOYiSB0YWFc6.W6bBdLO4KESpBlIhXcgl9aMe3v9tUqLTCoiMbi', 'miau', 'Rua Professor Urbano De Moura', '', 'ialexandra@gmail.com', 913891580, NULL, 1),
(7, 'Alexandra', '$2y$10$8HUC2y7KAocPsR/x6ga.0u5ibcEuEuBK6J8y/OnnRb2ZRx7rSvC1G', 'Alexandra', 'Rua Professor Urbano De Moura', 'NULL', 'ialex@gmail.com', 913891580, NULL, 1),
(8, 'yoyo', '$2y$10$fOgxTFbPdqADQyYnjioPh.RTc6h1gOsych.qcwMmdfXA/YCBG6L/e', 'yoyo', 'Rua Professor Urbano De Moura', 'NULL', 'ialexa@gmail.com', 913891583, 1234, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores_admin`
--

CREATE TABLE `utilizadores_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores_admin`
--

INSERT INTO `utilizadores_admin` (`id`, `username`, `password`, `email`, `tipo`, `is_active`) VALUES
(1, 'ialex03', '$2y$10$gYhXAfcuN2pGbwKlkoAQ6OnKHr2QmdmmM.3DVpzkRdQBSnggEBF8a', 'ialexandra2003@gmail.com', 0, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `banner_idiomas`
--
ALTER TABLE `banner_idiomas`
  ADD PRIMARY KEY (`id`,`idioma`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias_idiomas`
--
ALTER TABLE `categorias_idiomas`
  ADD PRIMARY KEY (`id`,`idioma`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `emails_newsletter`
--
ALTER TABLE `emails_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `linhas_encomenda`
--
ALTER TABLE `linhas_encomenda`
  ADD PRIMARY KEY (`id_produto`,`id_encomenda`);

--
-- Índices para tabela `mensagens_newsletter`
--
ALTER TABLE `mensagens_newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `menu_idiomas`
--
ALTER TABLE `menu_idiomas`
  ADD PRIMARY KEY (`id`,`idioma`);

--
-- Índices para tabela `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paginas_idiomas`
--
ALTER TABLE `paginas_idiomas`
  ADD PRIMARY KEY (`id`,`idioma`);

--
-- Índices para tabela `parceiros`
--
ALTER TABLE `parceiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos_idiomas`
--
ALTER TABLE `produtos_idiomas`
  ADD PRIMARY KEY (`id`,`idioma`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `utilizadores_admin`
--
ALTER TABLE `utilizadores_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `contratos`
--
ALTER TABLE `contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `emails_newsletter`
--
ALTER TABLE `emails_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `encomendas`
--
ALTER TABLE `encomendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `mensagens_newsletter`
--
ALTER TABLE `mensagens_newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `menu_idiomas`
--
ALTER TABLE `menu_idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `paginas_idiomas`
--
ALTER TABLE `paginas_idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `parceiros`
--
ALTER TABLE `parceiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `utilizadores_admin`
--
ALTER TABLE `utilizadores_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
