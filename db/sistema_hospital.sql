-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 04:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre_paciente` varchar(100) NOT NULL,
  `ap_pat_paciente` varchar(50) NOT NULL,
  `ap_mat_paciente` varchar(50) NOT NULL,
  `num_historia_clinica` varchar(30) NOT NULL,
  `num_sus` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo_paciente` varchar(30) NOT NULL,
  `lugar_nacimiento` varchar(50) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `departamento` varchar(30) NOT NULL,
  `procedencia` varchar(50) NOT NULL,
  `estado_civil` varchar(30) NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `grado_instruccion` varchar(30) NOT NULL,
  `diagnostico_ingreso` text NOT NULL,
  `medico_internacion` varchar(100) NOT NULL,
  `matricula_medico` varchar(50) NOT NULL,
  `direccion_paciente` varchar(200) NOT NULL,
  `enviado_de` varchar(100) NOT NULL,
  `estado_paciente` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre_paciente`, `ap_pat_paciente`, `ap_mat_paciente`, `num_historia_clinica`, `num_sus`, `fecha_nacimiento`, `sexo_paciente`, `lugar_nacimiento`, `provincia`, `departamento`, `procedencia`, `estado_civil`, `ocupacion`, `grado_instruccion`, `diagnostico_ingreso`, `medico_internacion`, `matricula_medico`, `direccion_paciente`, `enviado_de`, `estado_paciente`, `fecha_registro`) VALUES
(1, 'wilfredo', 'Saez', 'Garcia', '01', 's01', '1989-06-05', 'Masculino', 'Cochabamba', 'Cercado', 'Cochabamba', 'Boliviana', 'Soltero', 'Programador', 'U', 'Infeccion estomacal', 'Medrano', 'mt10', 'calle los lirios 248', 'Hospital del sur', 0, '2024-02-26 19:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `perfil` varchar(50) NOT NULL,
  `login_usuario` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `perfil`, `login_usuario`, `password`) VALUES
(1, 'Usuario Administrador', 'Administrador', 'admin', '$2y$10$bFvG6IQ8iBGzcuaj6XiHg.0vctqjkM2JhCJ94ndzfQ.AsPgdrLSNm'),
(4, 'Usuario medico de cabecera', 'Enfermero', 'medico', '$2y$10$dLW3z4Gc73IbzGdJD92oC.tzQ7B64NY8mG2MU7G.bdTsi2HNsIR7q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
