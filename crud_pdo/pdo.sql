create database crudsimples default character set utf8 default collate utf8_general_ci;

use crudsimples;

create table contatos(
    id int not null auto_increment,
    nome varchar(45) not null,
    email varchar(45) not null,
    celular varchar(15) default null,
    primary key(id)
);

select * from contatos
