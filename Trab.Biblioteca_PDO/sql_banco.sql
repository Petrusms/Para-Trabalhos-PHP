create database Biblioteca;
use Biblioteca;

create table Materiais_Leitura(
	id int auto_increment primary key not null,
    titulo varchar(50)not null,
    anoPublicacao int not null,
    categoria varchar(30)not null,
    numEdicao int,
    editora varchar(30),
    numPag int,
    numCap int
);

create table Usuarios(
    id int auto_increment primary key not null,
    nome varchar(100) not null,
    data_nascimento date not null,
    CPF varchar(14) not null unique,
    telefone varchar(15),
    senha varchar(255) not null
);


-- Exemplos livros
INSERT INTO Materiais_Leitura (titulo, anoPublicacao, categoria, numEdicao, editora, numPag, numCap) VALUES 
("Dom Casmurro", 1899, "Romance", NULL, NULL, 320, 19),
("O Alquimista", 1988, "Ficção/Fantasia", NULL, NULL, 208, 10),
("A Moreninha", 1844, "Romance", NULL, NULL, 240, 12),
("Grande Sertão: Veredas", 1956, "Romance Regionalista", NULL, NULL, 448, 22),
("O Guarani", 1857, "Romance Histórico", NULL, NULL, 300, 15);

-- Exemplos gibis
INSERT INTO Materiais_Leitura (titulo, anoPublicacao, categoria, numEdicao, editora, numPag, numCap) VALUES 
("Turma da Mônica", 2020, "Infantil", 100, NULL, NULL, NULL),
("Batman: O Cavaleiro das Trevas", 1986, "Ação/Aventura", 1, NULL, NULL, NULL),
("Mortal Kombat", 1994, "Ação", 5, NULL, NULL, NULL),
("Asterix e Obelix", 1967, "Aventura/Comédia", 12, NULL, NULL, NULL),
("Dragon Ball", 1984, "Ação/Fantasia", 20, NULL, NULL, NULL);

-- Exemplos revistas
INSERT INTO Materiais_Leitura (titulo, anoPublicacao, categoria, numEdicao, editora, numPag, numCap) VALUES 
("Veja", 2023,"Atualidades", 2500,"Abril",NULL,NULL),
("Superinteressante",2023,"Ciência e Cultura",400,"Abril",NULL,NULL),
("Época",2023,"Política e Economia",1000,"Globo",NULL,NULL),
("Claudia",2023,"Moda e Comportamento",1000,"Abril",NULL,NULL),
("Rolling Stone",2023,"Música e Cultura Pop",200,"Rolling Stone",NULL,NULL);

INSERT INTO Usuarios (nome, data_nascimento, CPF, telefone, senha) VALUES 
("Jorge", STR_TO_DATE("24/10/1998", "%d/%m/%Y"), "000.000.008-00", "(45) 99999-9999", "@jorge24"),
("Maria", STR_TO_DATE("04/01/2000", "%d/%m/%Y"), "800.547.120-00", "(45) 99999-9990", "@maria04"),
("João", STR_TO_DATE("03/09/2002", "%d/%m/%Y"), "800.549.119-00", "(45) 99999-9900", "@joAo03"),
("Lucas", STR_TO_DATE("13/11/2005", "%d/%m/%Y"), "800.846.118-00", "(45) 99999-9000", "@Lucas13"),
("Pedro", STR_TO_DATE("13/08/1990", "%d/%m/%Y"), "800.506.117-00", "(45) 99999-0000", "@PEDRO13");


