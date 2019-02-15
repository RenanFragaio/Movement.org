drop database if exists movement;

create database movement;

use movement;

/*use id6802051_movement;*/

create table usuario
(
id_usuario int auto_increment,
nome varchar(80),
email varchar(80),
senha varchar(20),
data_nasc date,
bio varchar(255),
foto_perfil varchar(255),
capa varchar(255),
nivel varchar(30),
Primary Key(id_usuario)
);

create table post
(
id_post int auto_increment,
id_usuario int,
conteudo text,
data_hora datetime,
curtidas int default 0,
Primary Key(id_post)
);

create table midia_post
(
id_post int,
id_midia int,
Primary Key(id_post,id_midia)
);

create table midia
(
id_midia int auto_increment,
id_usuario int,
arquivo varchar(255),
/*tipo varchar(255),*/
Primary Key(id_midia)
);

create table amizade
(
id_usuario1 int,
id_usuario2 int,
Primary Key(id_usuario1,id_usuario2)
);

create table curtir
(
id_usuario int,
id_post int,
Primary Key(id_usuario,id_post)
);

create table pagina
(
id_pagina int auto_increment,
nome varchar(255),
foto_perfil varchar(255),
descricao varchar(255),
capa varchar(255),
data_criacao datetime,
Primary Key(id_pagina)
);

alter table post
add(
Foreign key(id_usuario)
references usuario(id_usuario)
on update cascade
on delete restrict
);

alter table midia
add(
Foreign Key(id_usuario)
references usuario(id_usuario)
on update cascade
on delete restrict
);

alter table midia_post
add(
Foreign Key(id_post)
references post(id_post)
on update cascade
on delete restrict
);

alter table midia_post
add(
Foreign Key(id_midia)
references midia(id_midia)
on update cascade
on delete restrict
);

alter table amizade
add(
Foreign Key(id_usuario1)
references usuario(id_usuario)
on update cascade
on delete restrict
);

alter table amizade
add(
Foreign Key(id_usuario2)
references usuario(id_usuario)
on update cascade
on delete restrict
);

alter table curtir
add(
Foreign Key(id_usuario)
references usuario(id_usuario)
on update cascade
on delete restrict
);

alter table curtir
add(
Foreign Key(id_post)
references post(id_post)
on update cascade
on delete restrict
);

insert into usuario(nome,email,senha,data_nasc,foto_perfil,nivel,capa)
values ('Lucas Tejedor','tejedor@email.com','tejedor123','1998-01-20','../usuario/foto/semfoto.jpg','adm','../usuario/capa/apple-mouse-artificial-flowers-blurred-background-1229861.jpg');

insert into usuario(nome,email,senha,data_nasc,foto_perfil,nivel,capa)
values ('Renan Fragaio','renan@email.com','123456','1999-01-23','../usuario/foto/semfoto.jpg','basico','../usuario/capa/architecture-background-buildings-218983.jpg');

insert into usuario(nome,email,senha,data_nasc,foto_perfil,nivel)
values ('Usuario 1','u1@email.com','123456','1999-04-10','../usuario/foto/semfoto.jpg','basico');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('1','1','Pensando em postar alguma coisa','2019-01-17 08:00:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('2','1','Pensando em postar alguma coisa com uma imagem','2019-01-17 09:00:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('3','2','Pensando em postar alguma coisa','2019-01-18  08:00:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('4','2','Pensando em postar alguma coisa com uma imagem','2019-01-18  09:00:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('5','3','Postagem numero 4','2019-01-18 08:37:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('6','3','Postagem numero 5','2019-01-19 09:55:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('7','3','Postagem numero 6','2019-01-20 10:02:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('8','3','Postagem numero 7','2019-01-21 11:12:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('9','3','Postagem numero 8','2019-01-22 12:46:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('10','3','Postagem numero 9','2019-01-23 13:19:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('11','3','Postagem numero 10','2019-01-24 14:02:00');

insert into post(id_post,id_usuario,conteudo,data_hora)
values ('12','3','Postagem numero 11','2019-01-25 15:34:00');

insert into midia(id_midia,id_usuario,arquivo)
values ('1','1','../midia/arquivo/lock-solid.png');

insert into midia_post(id_post,id_midia)
values ('2','1');

insert into midia_post(id_post,id_midia)
values ('4','1');

insert into pagina(id_pagina,nome,foto_perfil,descricao,capa,data_criacao)
values ('1','Direita BR','../pagina/foto/semfoto_p.png','Uma página de direita','../pagina/capa/semcapa.png','2019-09-02 8:48:00');

insert into pagina(id_pagina,nome,foto_perfil,descricao,capa,data_criacao)
values ('2','Esquerda BR','../pagina/foto/semfoto_p.png','Uma página de esquerda','../pagina/capa/semcapa.png','2019-09-02 9:48:00');

insert into pagina(id_pagina,nome,foto_perfil,descricao,capa,data_criacao)
values ('3','Pagina1','../pagina/foto/semfoto_p.png','Uma página de esquerda','../pagina/capa/semcapa.png','2019-09-02 9:48:00');