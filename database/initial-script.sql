INSERT INTO web.Brands(BrandName, BrandRating) 
    VALUES 
	('Microsoft', 4), ('Sony', 5), ('Nintendo', 4.7),
	('Xiaomi', 5), ('Apple', 5), ('Samsung', 4.5),
	('Adidas', 4.3), ('Nike', 4.2), ('Olympikus', 3.9),
	('Ralph Lauren', 3.8), ('Tommy Hilfiger', 4.1), ('GAP', 4.5),
	('Fiat', 5), ('BWM', 3), ('Chevrolet', 4.6);
	
INSERT INTO web.Categories(CategoryName) 
    VALUES 
	('Video Games'), ('Celulares'), ('T�nis'), ('Camisetas'), ('Carros');

INSERT INTO web.Products(ProductName, ProductPrice, ProductDescription, ProductStock, ProductWeight, ProductVolume, ProductRating, ProductAdress, ProductCEP, ProductImage) VALUES
        ('PlayStation 4', 1999.99, 'O sistema PlayStation 4 abre as portas para uma jornada incr�vel pelos novos mundos de imers�o dos jogos e sua comunidade intensamente conectada. O PS4 coloca o jogador em primeiro lugar com uma sele��o de lan�amentos surpreendentes e mais de 180 jogos em desenvolvimento. Jogue os mais incr�veis hits de primeira linha e jogos independentes inovadores no PS4. Inspirado pelo desenvolvedor, focado no jogador.', 446, 753.069, 691.874, 0, 'Rua Lila Ripoll', 13405448, '/ecommerce/images/PlayStation 4.png'),
        ('Xbox One', 1889.90, 'Bem vindo a uma nova gera��o de jogos e entretenimento onde os jogos beiram a fronteira do realismo e ouvir m�sica enquanto joga acontece de maneira instant�nea, al�m disso, voc� pode mudar entre sua televis�o para m�sica ou um jogo em um instante. O entretenimento que voc� adora est� em um s� lugar. Bem vindo ao tudo em um, Xbox One.', 346, 833.717, 159.494, 2.43, 'Rua Presidente J�nio Quadros', 49066315, '/ecommerce/images/Xbox One.png'),
        ('Nintendo Switch', 1959.00, 'Get the gaming system that lets you play the games you want, wherever you are, however you like. This bundle includes the Nintendo Switch console and Nintendo Switch dock in black, with contrasting left and right Joy-Con controllers - one red, one blue. It also includes all the extras you need to get started.', 211, 747.675, 434.114, 4.14, 'Quadra CL 403 Bloco B', 76808418, '/ecommerce/images/Nintendo Switch.png'),
        ('Celular Mi A2 Lite', 998.00, 'Smartphone Xiaomi Mi A2 Lite Global Dourado 64GB 4GB RAM O Xiaomi Mi A2 Lite � um dos smartphones Android mais avan�ados e completos que existem em circula��o. Tem um grande display de 5.84 polegadas com uma resolu��o de 2280x1080 pixel. As funcionalidades oferecidas pelo Xiaomi Mi A2 Lite s�o muitas e inovadoras.', 309, 311.441, 312.045, 2.03, 'Rua 13 de Maio', 68901640, '/ecommerce/images/Celular Mi A2 Lite.webp'),
        ('iPhone 8 Apple Plus', 3499.00, 'Design inovador, totalmente em vidro. A c�mera que o mundo inteiro adora, ainda melhor. Um chip mais poderoso e inteligente. Recarga sem fio simples de verdade. O iPhone 8 Plus � brilhante.', 183, 960.686, 876.903, 4.97, 'Rua Roberto de Souza', 69075338, '/ecommerce/images/iPhone 8 Apple Plus.png'),
        ('Samsung Galaxy S9', 1699.00, 'O�Samsung Galaxy S9�� um dos smartphones Android mais avan�ados e completos que existem em circula��o. Tem um grande display de 5.8 polegadas e uma resolu��o de 2960x1440 pixels que � uma das mais altas atualmente em circula��o. As funcionalidades oferecidas pelo�Samsung Galaxy S9�s�o muitas e inovadoras.', 134, 658.277, 494.917, 0.21, 'Avenida General Ata�de Teive', 4622001, '/ecommerce/images/Samsung Galaxy S9.jpg'),
        ('T�nis Deerupt', 349.99, 'O T�nis Casual Adidas EVA Deerupt Runner Masculino � definido por um design minimalista que se destaca. Este t�nis exibe tiras que cobrem o cabedal e a entressola. Um cabedal flex�vel e ajust�vel facilita na hora de cal�ar. Este t�nis leve � confeccionado para oferecer muito conforto ao caminhar ou correr. Fecho de cadar�o, cabedal de mesh, rede de tecido quadriculado cobrindo toda a pe�a e solado de borracha.', 206, 466.422, 156.274, 1.12, 'Quadra T 21 Avenida TNS 2', 71761335, '/ecommerce/images/T�nis Deerupt.webp'),
        ('T�nis Nike Revolution', 199.99, 'Garanta m�ximo conforto nas atividades f�sicas cal�ando o t�nis feminino Nike Wmns Revolution 4! Este incr�vel t�nis de corrida aposta na leveza e maciez para te acompanhar na academia e no dia a dia.', 14, 138.774, 822.302, 4.38, 'Rua Jos� Mendes Castelo Branco', 27430140, '/ecommerce/images/T�nis Nike Revolution.png'),
        ('T�nis Olympikus Breed', 89.99, 'Deixe o conforto de Olympikus Breed acompanhar todos os seus passos. Estruturado em tecido jacquard com design exclusivo, o visual ultramoderno do t�nis � complementado por um refor�o na parte traseira com tecnologia SUPPORTER que garante a estabilidade na pisada.', 216, 59.258, 327.298, 0.88, 'Rua Raimundo Ribeiro dos Santos', 68902862, '/ecommerce/images/T�nis Olympikus Breed.webp'),
        ('Camiseta Ralph Lauren Custom Fit Branca', 99.99, 'Camisa Polo Polo Ralph Lauren Custom Fit Branca', 2, 49.512, 875.215, 4.3, 'Passagem S�o Benedito', 13450455, '/ecommerce/images/Camiseta Ralph Lauren Custom Fit Branca.jpg'),
        ('Camiseta Tommy Hilfiger Masculina Classic Branca', 99.99, 'Camiseta Tommy Hilfiger Masculina Classic Branca', 308, 576.157, 336.165, 2.89, 'Rua das Avencas', 92440066, '/ecommerce/images/Camiseta Tommy Hilfiger Masculina Classic Branca.jpg'),
        ('Moletom Fechado GAP Logo Bordado Cinza', 129.99, 'Moletom Fechado GAP Logo Bordado Cinza', 124, 996.784, 30.027, 4.4, 'Rua Vasconcelos', 66833760, '/ecommerce/images/Moletom Fechado GAP Logo Bordado Cinza.webp'),
        ('Fiat 147 - Ano 84', 14900.00, 'Fiat 147 - Ano 84', 314, 898.48, 164.863, 0.55, 'Quadra SQNW 307 Bloco J', 79100440, '/ecommerce/images/Fiat 147 - Ano 84.jpg'),
        ('BMW M5', 695000.00, 'BMW M5', 461, 831.996, 220.572, 0.87, 'Rua 7', 69312453, '/ecommerce/images/BMW M5.png'),
        ('Chevrolet Camaro', 333990.00, 'Chevrolet Camaro', 470, 157.484, 775.389, 3.37, 'Rua Divina Pastora', 91130080, '/ecommerce/images/Chevrolet Camaro.jpg');

INSERT INTO web.ProductBrands(ProductID, BrandID) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15);

INSERT INTO web.ProductCategories(ProductID, CategoryID) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 3),
(8, 3),
(9, 3),
(10, 4),
(11, 4),
(12, 4),
(13, 5),
(14, 5),
(15, 5);
