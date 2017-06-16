/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     13/06/2017 11.40.42                          */
/*==============================================================*/


drop table if exists acara;

/*==============================================================*/
/* Table: acara                                                 */
/*==============================================================*/
create table acara
(
   id_acara             int(24) not null,
   pengaju_acara        varchar(1024),
   nama_acara           varchar(1024),
   deskripsi_acara      varchar(1024),
   tanggal_acara        timestamp,
   status               int(1),
   primary key (id_acara)
);

