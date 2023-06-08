-- Mario
CREATE TABLE Profesores (
	idProfesor tinyint unsigned AUTO_INCREMENT,
	nombre varchar(50) NOT NULL,
	correo varchar(70) NOT NULL,
	contrasenia varchar(255) NOT NULL,
	CONSTRAINT Pk_idProfesor PRIMARY KEY (idprofesor),
	CONSTRAINT Csu_correoProfesor UNIQUE (correo)
);

CREATE TABLE Clases (
	idClase tinyint unsigned AUTO_INCREMENT,
	nombre varchar(6) NOT NULL,
	CONSTRAINT Pk_idClase PRIMARY KEY (idClase),
	CONSTRAINT Csu_NombreClase_Clases UNIQUE (nombre)
);

CREATE TABLE Alumnos (
	idAlumno tinyint unsigned AUTO_INCREMENT,
   nombre varchar(50) NOT NULL,
	apellido varchar(50) NOT NULL,
   CONSTRAINT Pk_idAlumno_Alumnos PRIMARY KEY (idAlumno)
);

-- Alberto
CREATE TABLE Etapas(
	idEtapa tinyint unsigned PRIMARY KEY not null AUTO_INCREMENT,
	nombre varchar(20) not null
);

CREATE TABLE Reservas(
	idReserva SMALLINT unsigned PRIMARY KEY not null AUTO_INCREMENT,
	fechaHoraRes datetime not NULL DEFAULT NOW(),
	fechaDiareserva datetime not null,
	hora tinyint unsigned not null CHECK(hora BETWEEN 1 AND 7),
	idProfesor tinyint unsigned not null,
	tipo char(1) not null CHECK(tipo IN('C','O')),
	CONSTRAINT fk_idProfesor_Reservas FOREIGN KEY (idProfesor) REFERENCES Profesores(idProfesor),
	CONSTRAINT csu_unique_Resrevas UNIQUE (fechaHoraRes, idProfesor)
);

CREATE TABLE Carritos(
	codigoCarrito char(4) PRIMARY KEY not null,
	descripcion varchar(100) not null,
	idEtapa tinyint unsigned not null,
	CONSTRAINT fk_idEtapa_Carritos FOREIGN KEY (idEtapa) REFERENCES Etapas(idEtapa)
);

-- Domingo
CREATE TABLE Ordenadores(
	codigoCarrito varchar(4) NOT NULL,
	numOrdenador tinyint unsigned NOT NULL,
	CONSTRAINT PK_Ordenadores PRIMARY KEY (codigoCarrito, numOrdenador),
   CONSTRAINT FK_codigoCarrito_Ordenadores FOREIGN KEY (codigoCarrito) REFERENCES Carritos(codigoCarrito)
);

CREATE TABLE ReservaCarritos(
	idReservaCarrito SMALLINT NOT NULL,		-- No es auto increment ya que estos id son creados en la tabla Reservas
	codigoCarrito char(4) NOT NULL,
	idClase tinyint NOT NULL,
	CONSTRAINT PK_idReservaCarrito_ReservaCarritos PRIMARY KEY (idReservaCarrito),
	CONSTRAINT FK_idReservaCarrito_ReservaCarritos FOREIGN KEY (idReservaCarrito) REFERENCES Reservas(idReserva) ON UPDATE CASCADE ON DELETE CASCADE,	-- Borrado y modificación en cascada
	CONSTRAINT FK_idClase_ReservaCarritos FOREIGN KEY (idClase) REFERENCES Clases(idClase)
);

CREATE TABLE ReservaOrdenadores(
	idReservaOrdenador SMALLINT NOT NULL,		-- No es auto increment ya que estos id son creados en la tabla Reservas
	codigoCarrito char(4) NOT NULL,
	numOrdenador tinyint NOT NULL,
	idAlumno smallint NOT NULL,
	CONSTRAINT PK_idReservaOrdenador_ReservaOrdenadores PRIMARY KEY (idReservaOrdenador),
	CONSTRAINT FK_idReservaOrdenador_ReservaOrdenadores FOREIGN KEY (idReservaOrdenador) REFERENCES Reservas(idReserva) ON UPDATE CASCADE ON DELETE CASCADE,		-- Borrado y modificación en cascada
	CONSTRAINT FK_codigoCarrito_numOrdenador_ReservaOrdenadores FOREIGN KEY (codigoCarrito,numOrdenador) REFERENCES Ordenadores(codigoCarrito,numOrdenador)
);