create database pit_julio;
use pit_julio;
create table Atleta(
id int not null auto_increment primary key,
nome varchar(80) not null,
data_nasc varchar(10) not null,
esporte varchar(100) not null,
email varchar(100) not null,
telefone char(15) not null,
senha varchar(125) not null
);

create table Empresas(
id int not null auto_increment primary key,
nome varchar(80) not null,
email varchar(100) not null,
telefone_comercial char(15) not null,
cnpj varchar(14) not null,
patrocinador varchar(125)
);