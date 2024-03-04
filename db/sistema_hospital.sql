-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 01:47 PM
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
-- Table structure for table `evolucion_orden`
--

CREATE TABLE `evolucion_orden` (
  `id_evolucion_orden` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_hora_evolucion` datetime NOT NULL,
  `nota_evolucion` text NOT NULL,
  `orden_medica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `evolucion_orden`
--

INSERT INTO `evolucion_orden` (`id_evolucion_orden`, `id_paciente`, `fecha_hora_evolucion`, `nota_evolucion`, `orden_medica`) VALUES
(2, 1, '2024-03-04 08:17:00', 'asd', 'qwe'),
(3, 1, '2024-03-05 10:20:00', 'zxc', 'asd'),
(4, 1, '2024-03-05 08:47:00', 'aumento de temperatura', 'administracion de diclofenaco');

-- --------------------------------------------------------

--
-- Table structure for table `historia`
--

CREATE TABLE `historia` (
  `id_historia` int(11) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fuente_historia` varchar(255) DEFAULT NULL,
  `motivo_consulta` text DEFAULT NULL,
  `anamnesis` text DEFAULT NULL,
  `antecedentes` text DEFAULT NULL,
  `revision_sistema` text DEFAULT NULL,
  `fecha_historia` date DEFAULT NULL,
  `hora_historia` time DEFAULT NULL,
  `precion_actual` varchar(50) DEFAULT NULL,
  `talla` decimal(5,2) DEFAULT NULL,
  `tmp_auxiliar` varchar(30) DEFAULT NULL,
  `tmp_bucal` varchar(30) DEFAULT NULL,
  `tmp_rectal` varchar(30) DEFAULT NULL,
  `pulso` int(11) DEFAULT NULL,
  `frec_respiratoria` int(11) DEFAULT NULL,
  `presion_max` int(11) DEFAULT NULL,
  `presion_min` int(11) DEFAULT NULL,
  `exm_fis_general` text DEFAULT NULL,
  `exm_fis_regional` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
-- Table structure for table `traspaso`
--

CREATE TABLE `traspaso` (
  `id_traspaso` int(11) NOT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_egreso` date DEFAULT NULL,
  `hora_ingreso` time DEFAULT NULL,
  `hora_egreso` time DEFAULT NULL,
  `servicio` varchar(255) DEFAULT NULL,
  `sala` varchar(50) DEFAULT NULL,
  `cama` varchar(50) DEFAULT NULL,
  `operaciones` text DEFAULT NULL,
  `diagnostico` text DEFAULT NULL,
  `otroDiagnostico` text DEFAULT NULL,
  `causasExternas` text DEFAULT NULL,
  `numDiasEstadia` int(11) DEFAULT NULL,
  `condEgreso` varchar(50) DEFAULT NULL,
  `causaAlta` varchar(50) DEFAULT NULL,
  `recienNacido` varchar(50) DEFAULT NULL,
  `tipoNacido` varchar(50) DEFAULT NULL,
  `sexoNacido` varchar(50) DEFAULT NULL,
  `condNacer` varchar(50) DEFAULT NULL,
  `pesoNacido` decimal(10,2) DEFAULT NULL,
  `nomMedico` varchar(100) DEFAULT NULL,
  `matrMedico` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `traspaso`
--

INSERT INTO `traspaso` (`id_traspaso`, `id_paciente`, `fecha_ingreso`, `fecha_egreso`, `hora_ingreso`, `hora_egreso`, `servicio`, `sala`, `cama`, `operaciones`, `diagnostico`, `otroDiagnostico`, `causasExternas`, `numDiasEstadia`, `condEgreso`, `causaAlta`, `recienNacido`, `tipoNacido`, `sexoNacido`, `condNacer`, `pesoNacido`, `nomMedico`, `matrMedico`) VALUES
(1, 1, '2024-03-03', '2024-03-05', '16:51:00', '20:51:00', 'xx', '1', '2', 'a', '', 'f', 'g', 2, 'vivo', 'Recuperacion', '', 'gemelos', 'masculino', 'vivo', 0.00, 'Luciana', 'l01');

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
-- Indexes for table `evolucion_orden`
--
ALTER TABLE `evolucion_orden`
  ADD PRIMARY KEY (`id_evolucion_orden`);

--
-- Indexes for table `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id_historia`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indexes for table `traspaso`
--
ALTER TABLE `traspaso`
  ADD PRIMARY KEY (`id_traspaso`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evolucion_orden`
--
ALTER TABLE `evolucion_orden`
  MODIFY `id_evolucion_orden` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `historia`
--
ALTER TABLE `historia`
  MODIFY `id_historia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `traspaso`
--
ALTER TABLE `traspaso`
  MODIFY `id_traspaso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
