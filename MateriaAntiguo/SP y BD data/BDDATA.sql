USE [camposdin]
GO

INSERT INTO usuario(id_usuario,nombre_usuario,apellido1_usuario,apellido2_usuario,fnacimiento_usuario,borrado,vigencia)
VALUES (1,'Benjamín','Sanchez','Borgeaud','2002-07-20',0,1),
(2,'Roberto','Nieves','Tocornal','2001-05-13',0,1),
(3,'Edward','Contreras','Aqueveque','2002-05-03',0,1),
(4,'Christian','González','Retamal','2001-08-15',0,1),
(5,'Joaquín','Aguilar','Ampuero','2002-01-08',0,1);

INSERT INTO region (id_region,num_region,nombre_region,borrado,vigencia)
VALUES (1,2,'Región de Antofagasta',0,1),
(2,5,'Región de Valparaíso',0,1),
(3,9,'Región de la Araucanía',0,1),
(4,7,'Región del Maule',0,1),
(5,10,'Región de los Lagos',0,1);

INSERT INTO contacto (id_contacto,id_usuario,celular_contacto,telefono_contacto,correo_contacto,borrado,vigencia)
VALUES(1,1,NULL,946782340,'vivahololaiv@gmail.com',0,1),
(2,2,NULL,923478990,'ilikecows@gmail.com',0,1),
(3,3,NULL,924582483,'nosoytsundere@gmail.com',0,1),
(4,4,NULL,989450334,'quieromasmonitores@gmail.com',0,1),
(5,5,NULL,958493999,'vivanlostutitos@gmail.com',0,1);

INSERT INTO ubicacion (id_ubicacion,id_usuario,id_region,comuna_ubicacion,calle_ubicacion,num_ubicacion,inmueble_ubicacion,borrado,vigencia)
VALUES (1,1,1,'Calama','Vargas',1945,NULL,0,1),
(2,2,2,'Calle Larga','Las Mercedes',0890,NULL,0,1),
(3,3,3,'Temuco','Barcelona',1492,NULL,0,1),
(4,4,4,'Parral','Olavarría',1322,NULL,0,1),
(5,5,5,'Castro','Avenida Galvarino Riveros',1987,NULL,0,1);

INSERT INTO formulario (id_formulario,id_usuario,nombre_formulario,borrado,vigencia)
VALUES (1,3,'Formulario Edward',0,1),
(2,5,'Formulario Joaquín',0,1),
(3,4,'Formulario Christian',0,1),
(4,2,'Formulario Roberto',0,1),
(5,1,'Formulario Benjamín',0,1);

INSERT INTO enlaces(id_formulario,nombre_tabla,nombre_campo,nombre_campo_form,visibilidad_campo,borrado,vigencia)
VALUES (1,'Contacto','Correo Contacto','algo',1,0,1),
(2,'Ubicacion','Comuna','algo2',1,0,1),
(3,'Usuario','Nombre','algo3',1,0,1),
(4,'Formulario','Nombre Formulario','algo4',1,0,1),
(5,'Región','Nombre Región','algo5',1,0,1);
