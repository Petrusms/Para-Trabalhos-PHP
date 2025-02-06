create database Biblioteca;
use Biblioteca;

create table Materiais_Leitura(
	id int auto_increment primary key not null,
    tipo varchar(1) NOT NULL,
    titulo varchar(50)not null,
    anoPublicacao int not null,
    categoria varchar(30)not null,
    numEdicao int,
    editora varchar(30),
    numPag int,
    numCap int
);

-- Exemplos livros
INSERT INTO Materiais_Leitura (tipo, titulo, anoPublicacao, categoria, numEdicao, editora, numPag, numCap) VALUES 
("L", "Dom Casmurro", 1899, "Romance", NULL, NULL, 320, 19),
("L", "O Alquimista", 1988, "Ficção/Fantasia", NULL, NULL, 208, 10),
("L", "A Moreninha", 1844, "Romance", NULL, NULL, 240, 12),
("L", "Grande Sertão: Veredas", 1956, "Romance Regionalista", NULL, NULL, 448, 22),
("L", "O Guarani", 1857, "Romance Histórico", NULL, NULL, 300, 15);

-- Exemplos gibis
INSERT INTO Materiais_Leitura (tipo, titulo, anoPublicacao, categoria, numEdicao, editora, numPag, numCap) VALUES 
("G", "Turma da Mônica", 2020, "Infantil", 100, NULL, NULL, NULL),
("G", "Batman: O Cavaleiro das Trevas", 1986, "Ação/Aventura", 1, NULL, NULL, NULL),
("G", "Mortal Kombat", 1994, "Ação", 5, NULL, NULL, NULL),
("G", "Asterix e Obelix", 1967, "Aventura/Comédia", 12, NULL, NULL, NULL),
("G", "Dragon Ball", 1984, "Ação/Fantasia", 20, NULL, NULL, NULL);

-- Exemplos revistas
INSERT INTO Materiais_Leitura (tipo, titulo, anoPublicacao, categoria, numEdicao, editora, numPag, numCap) VALUES 
("R", "Veja", 2023,"Atualidades", 2500,"Abril",NULL,NULL),
("R", "Superinteressante",2023,"Ciência e Cultura",400,"Abril",NULL,NULL),
("R", "Época",2023,"Política e Economia",1000,"Globo",NULL,NULL),
("R", "Claudia",2023,"Moda e Comportamento",1000,"Abril",NULL,NULL),
("R", "Rolling Stone",2023,"Música e Cultura Pop",200,"Rolling Stone",NULL,NULL);

select * from Materiais_Leitura;
-- drop database Biblioteca;

