DROP DATABASE IF EXISTS empleolocal;

CREATE DATABASE empleolocal;

USE empleolocal;

// TABLA ROLES
CREATE TABLE roles(
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO roles(nombre) VALUES
('Administrador'),
('Empresa'),
('Candidato');

// TABLA USUARIOS
CREATE TABLE usuarios(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(120) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_rol INT NOT NULL,
    estado TINYINT DEFAULT 1,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_rol)
    REFERENCES roles(id_rol)
);

CREATE INDEX idx_usuario_correo 
ON usuarios(correo);

// TABLA EMPRESAS
CREATE TABLE empresas(
    id_empresa INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL UNIQUE,
    nombre_empresa VARCHAR(150) NOT NULL,
    descripcion TEXT,
    ubicacion VARCHAR(100),
    sector VARCHAR(100),
    telefono VARCHAR(30),
    sitio_web VARCHAR(150),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_usuario)
    REFERENCES usuarios(id_usuario)
);

// TABLA CANDIDATOS
CREATE TABLE candidatos(
    id_candidato INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL UNIQUE,
    descripcion TEXT,
    ubicacion VARCHAR(100),
    experiencia VARCHAR(100),
    disponibilidad VARCHAR(100),
    curriculum VARCHAR(255),
    FOREIGN KEY(id_usuario)
    REFERENCES usuarios(id_usuario)
);

// TABLA CATEGORIAS
CREATE TABLE categorias(
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO categorias(nombre) VALUES
('Tecnología'),
('Administración'),
('Ventas'),
('Diseño'),
('Educación'),
('Marketing'),
('Servicio al cliente');

// TABLA HABILIDADES
CREATE TABLE habilidades(
    id_habilidad INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL UNIQUE
);

INSERT INTO habilidades(nombre) VALUES
('PHP'),
('JavaScript'),
('MySQL'),
('HTML'),
('CSS'),
('Java'),
('Python'),
('Excel'),
('Comunicación'),
('Trabajo en equipo');

// TABLA RELACION CANDIDATO HABILIDAD
CREATE TABLE candidato_habilidad(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_candidato INT NOT NULL,
    id_habilidad INT NOT NULL,
    nivel VARCHAR(50),
    FOREIGN KEY(id_candidato)
    REFERENCES candidatos(id_candidato)
    ON DELETE CASCADE,
    FOREIGN KEY(id_habilidad)
    REFERENCES habilidades(id_habilidad)
);

// TABLA OFERTAS
CREATE TABLE ofertas(
    id_oferta INT AUTO_INCREMENT PRIMARY KEY,
    id_empresa INT NOT NULL,
    id_categoria INT NOT NULL,
    titulo VARCHAR(150) NOT NULL,
    descripcion TEXT NOT NULL,
    requisitos TEXT,
    salario DECIMAL(10,2),
    modalidad ENUM(
        'Presencial',
        'Remoto',
        'Hibrido'
    )
    DEFAULT 'Presencial',
    ubicacion VARCHAR(100),
    estado TINYINT DEFAULT 1,
    fecha_publicacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_empresa)
    REFERENCES empresas(id_empresa)
    ON DELETE CASCADE,
    FOREIGN KEY(id_categoria)
    REFERENCES categorias(id_categoria)
);

CREATE INDEX idx_oferta_empresa
ON ofertas(id_empresa);

// TABLA HABILIDADES OFERTA
CREATE TABLE oferta_habilidad(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_oferta INT NOT NULL,
    id_habilidad INT NOT NULL,
    FOREIGN KEY(id_oferta)
    REFERENCES ofertas(id_oferta)
    ON DELETE CASCADE,
    FOREIGN KEY(id_habilidad)
    REFERENCES habilidades(id_habilidad)
);

// TABLA ESTADOS POSTULACION
CREATE TABLE estados_postulacion(
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL UNIQUE
);

INSERT INTO estados_postulacion(nombre)
VALUES
('Pendiente'),
('En revisión'),
('Entrevista'),
('Aceptado'),
('Rechazado');

// TABLA POSTULACIONES
CREATE TABLE postulaciones(
    id_postulacion INT AUTO_INCREMENT PRIMARY KEY,
    id_oferta INT NOT NULL,
    id_candidato INT NOT NULL,
    id_estado INT NOT NULL DEFAULT 1,
    fecha_postulacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_oferta)
    REFERENCES ofertas(id_oferta)
    ON DELETE CASCADE,
    FOREIGN KEY(id_candidato)
    REFERENCES candidatos(id_candidato)
    ON DELETE CASCADE,
    FOREIGN KEY(id_estado)
    REFERENCES estados_postulacion(id_estado)
);

CREATE INDEX idx_postulacion_oferta
ON postulaciones(id_oferta);

CREATE INDEX idx_postulacion_candidato
ON postulaciones(id_candidato);

// TABLA FAVORITOS
CREATE TABLE favoritos(
    id_favorito INT AUTO_INCREMENT PRIMARY KEY,
    id_candidato INT NOT NULL,
    id_oferta INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE(id_candidato,id_oferta),
    FOREIGN KEY(id_candidato)
    REFERENCES candidatos(id_candidato)
    ON DELETE CASCADE,
    FOREIGN KEY(id_oferta)
    REFERENCES ofertas(id_oferta)
    ON DELETE CASCADE
);

// TABLA NOTIFICACIONES
CREATE TABLE notificaciones(
    id_notificacion INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    mensaje TEXT NOT NULL,
    leido TINYINT DEFAULT 0,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_usuario)
    REFERENCES usuarios(id_usuario)
    ON DELETE CASCADE
);

// USUARIO ADMINISTRADOR DEMO
INSERT INTO usuarios
(
    nombre,
    correo,
    password,
    id_rol
)
VALUES
(
    'Administrador',
    'admin@empleolocal.com',
    '$2y$10$abcdefghijklmnopqrstuv',
    1
);