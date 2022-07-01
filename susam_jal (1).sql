-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 07:07 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `susam_jal`
--
CREATE DATABASE IF NOT EXISTS `susam_jal` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `susam_jal`;

-- --------------------------------------------------------

--
-- Table structure for table `activity_master`
--

CREATE TABLE `activity_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `name`, `is_active`) VALUES
(1, 'Activity 1', 1),
(2, 'Activity 2', 1),
(3, 'Activity 3', 1),
(4, 'Activity 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `amrut_dw_bulk_user_data`
--

CREATE TABLE `amrut_dw_bulk_user_data` (
  `id` int(13) NOT NULL,
  `district` varchar(55) DEFAULT NULL,
  `sub_division` varchar(55) DEFAULT NULL,
  `ulb_name` varchar(55) DEFAULT NULL,
  `ward_no` varchar(55) DEFAULT NULL,
  `habitation` varchar(55) DEFAULT NULL,
  `location` varchar(55) DEFAULT NULL,
  `housing_name` varchar(55) DEFAULT NULL,
  `secretary` varchar(55) DEFAULT NULL,
  `contact_no` varchar(55) DEFAULT NULL,
  `user_type` varchar(55) DEFAULT NULL,
  `family_no` varchar(55) DEFAULT NULL,
  `total_family` varchar(55) DEFAULT NULL,
  `male` varchar(55) DEFAULT NULL,
  `female` varchar(55) DEFAULT NULL,
  `child` varchar(55) DEFAULT NULL,
  `water_source` varchar(55) DEFAULT NULL,
  `bulk_water` varchar(55) DEFAULT NULL,
  `ground_water` varchar(55) DEFAULT NULL,
  `func_water_meter` varchar(55) DEFAULT NULL,
  `non_func_water_meter` varchar(55) DEFAULT NULL,
  `unmeter` varchar(55) DEFAULT NULL,
  `water_supply_time` varchar(55) DEFAULT NULL,
  `consumption` varchar(55) DEFAULT NULL,
  `complain` varchar(55) DEFAULT NULL,
  `problem` varchar(55) DEFAULT NULL,
  `resolve` varchar(55) DEFAULT NULL,
  `resolve_time` varchar(55) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_dw_bulk_user_data`
--

INSERT INTO `amrut_dw_bulk_user_data` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `habitation`, `location`, `housing_name`, `secretary`, `contact_no`, `user_type`, `family_no`, `total_family`, `male`, `female`, `child`, `water_source`, `bulk_water`, `ground_water`, `func_water_meter`, `non_func_water_meter`, `unmeter`, `water_supply_time`, `consumption`, `complain`, `problem`, `resolve`, `resolve_time`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 13:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_dw_central_data_on_drinking_water`
--

CREATE TABLE `amrut_dw_central_data_on_drinking_water` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `domestic_connections_metered_functional` varchar(50) DEFAULT NULL,
  `domestic_connection_metered_non_functional` tinytext DEFAULT NULL,
  `domestic_connections_unmetered` varchar(50) DEFAULT NULL,
  `total_domestic_connection` varchar(11) DEFAULT NULL,
  `bulk_supply_apartments_metered_functional` tinytext DEFAULT NULL,
  `bulk_supply_apartments_metered_non_functional` varchar(50) DEFAULT NULL,
  `bulk_supply_apartments_unmetered` tinytext DEFAULT NULL,
  `total_bulk_supply_apartments` varchar(11) DEFAULT NULL,
  `bulk_supply_societies_metered_functional` tinytext DEFAULT NULL,
  `bulk_supply_societies_metered_non_functional` tinytext DEFAULT NULL,
  `bulk_supply_societies_unmetered` varchar(50) DEFAULT NULL,
  `total_bulk_supply_societies` varchar(11) DEFAULT NULL,
  `metered_functional_others` tinytext DEFAULT NULL,
  `metered_non_functional_others` tinytext DEFAULT NULL,
  `unmetered_others` tinytext DEFAULT NULL,
  `total_others` varchar(11) DEFAULT NULL,
  `total_residential_water_supply_connections` varchar(11) DEFAULT NULL,
  `households_served_by_domestic_connections` varchar(11) DEFAULT NULL,
  `households_served_by_bulk_supply_apartments` tinytext DEFAULT NULL,
  `households_served_by_bulk_supply_societies` varchar(11) DEFAULT NULL,
  `total_water_supply_households_served` varchar(11) DEFAULT NULL,
  `capacity_of_plants_for_surface_water_sources` tinytext DEFAULT NULL,
  `water_volume_of_surface_water_sources` text DEFAULT NULL,
  `capacity_of_plants_for_ground_water_sources` tinytext DEFAULT NULL,
  `water_volume_of_ground_water_pumps` text DEFAULT NULL,
  `water_volume_of_other_sources` varchar(11) DEFAULT NULL,
  `total_installed_capacity` varchar(11) DEFAULT NULL,
  `total_volume_of_water_produced` varchar(11) DEFAULT NULL,
  `supplied_water_volume_for_domestic_connections` text DEFAULT NULL,
  `supplied_water_volume_for_bulk_supply_apartments` text DEFAULT NULL,
  `supplied_water_volume_for_bulk_supply_societies` varchar(11) DEFAULT NULL,
  `supplied_water_volume_for_non_domestic_connections` text DEFAULT NULL,
  `supplied_water_volume_for_public_taps` varchar(11) DEFAULT NULL,
  `supplied_water_volume_for_other_sources` varchar(11) DEFAULT NULL,
  `total_volume_of_water_billed` varchar(11) DEFAULT NULL,
  `unbilled_water_volume_for_free_supplies` varchar(11) DEFAULT NULL,
  `unbilled_water_volume_for_free_connections` varchar(11) DEFAULT NULL,
  `total_water_produced` varchar(11) DEFAULT NULL,
  `total_requirement_of_water` varchar(11) DEFAULT NULL,
  `gap_in_production` varchar(11) DEFAULT NULL,
  `source_of_augmentation` varchar(11) DEFAULT NULL,
  `volume_of_non_revenue_water_produced` varchar(11) DEFAULT NULL,
  `volume_of_non_revenue_water_supplied` varchar(11) DEFAULT NULL,
  `non_domestic_metered_functional` varchar(11) DEFAULT NULL,
  `non_domestic_metered_non_functional` varchar(11) DEFAULT NULL,
  `non_domestic_unmetered` varchar(11) DEFAULT NULL,
  `non_domestic_total` varchar(11) DEFAULT NULL,
  `taps_posts_pumps_metered_functional` varchar(11) DEFAULT NULL,
  `taps_posts_pumps_metered_non_functional` varchar(11) DEFAULT NULL,
  `taps_posts_pumps_unmetered` varchar(11) DEFAULT NULL,
  `total_public_taps` varchar(11) DEFAULT NULL,
  `total_metered_functional_connections` varchar(11) DEFAULT NULL,
  `total_water_supply_connections` varchar(11) DEFAULT NULL,
  `supply_days_per_month` varchar(11) DEFAULT NULL,
  `average_duration_of_each_supply` varchar(11) DEFAULT NULL,
  `complaints_received` varchar(11) DEFAULT NULL,
  `complaints_resolved` varchar(11) DEFAULT NULL,
  `chlorine_samples_at_water_plant` varchar(11) DEFAULT NULL,
  `chlorine_samples_at_intermediate_points` varchar(11) DEFAULT NULL,
  `chlorine_samples_at_consumer_end` text DEFAULT NULL,
  `total_samples_for_chlorine_tests_without_location` varchar(11) DEFAULT NULL,
  `total_samples_for_chlorine_tests` varchar(11) DEFAULT NULL,
  `number_of_samples_passed` varchar(11) DEFAULT NULL,
  `physical_samples_at_water_plant` varchar(11) DEFAULT NULL,
  `physical_samples_at_intermediate_points` text DEFAULT NULL,
  `physical_samples_at_consumer_end` varchar(11) DEFAULT NULL,
  `total_samples_for_physical_tests_without_location` text DEFAULT NULL,
  `total_samples_for_physical_n_chemical_tests` varchar(11) DEFAULT NULL,
  `number_of_physical_samples_passed` varchar(11) DEFAULT NULL,
  `bacteriological_samples_at_water_plant` varchar(11) DEFAULT NULL,
  `bacteriological_samples_at_intermediate_point` varchar(11) DEFAULT NULL,
  `bacteriological_samples_at_consumer_end` varchar(11) DEFAULT NULL,
  `total_bacteriological_samples_without_location` varchar(11) DEFAULT NULL,
  `total_bacteriological_samples` varchar(11) DEFAULT NULL,
  `no_of_bacteriological_samples_passed` varchar(11) DEFAULT NULL,
  `total_samples_for_all_types` varchar(11) DEFAULT NULL,
  `total_tests_passed` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `amrut_dw_data_from_commercial_establishment`
--

CREATE TABLE `amrut_dw_data_from_commercial_establishment` (
  `id` int(13) NOT NULL,
  `distric` varchar(55) DEFAULT NULL,
  `sub_division` varchar(55) DEFAULT NULL,
  `ulb_name` varchar(55) DEFAULT NULL,
  `wand_no` varchar(55) DEFAULT NULL,
  `habitation` varchar(55) DEFAULT NULL,
  `location` varchar(55) DEFAULT NULL,
  `market_establish_name` varchar(55) DEFAULT NULL,
  `head_of_staff_nm` varchar(55) DEFAULT NULL,
  `contact_no` varchar(55) DEFAULT NULL,
  `user_type` varchar(55) DEFAULT NULL,
  `no_of_shop` varchar(55) DEFAULT NULL,
  `total_water_user` varchar(55) DEFAULT NULL,
  `water_source` varchar(55) DEFAULT NULL,
  `bulk_water` varchar(55) DEFAULT NULL,
  `ground_water` varchar(55) DEFAULT NULL,
  `func_water_meter` varchar(55) DEFAULT NULL,
  `non_func_water_meter` varchar(55) DEFAULT NULL,
  `unmeter` varchar(55) DEFAULT NULL,
  `water_supply_time` varchar(55) DEFAULT NULL,
  `consumption` varchar(55) DEFAULT NULL,
  `complain` varchar(55) DEFAULT NULL,
  `problem` varchar(55) DEFAULT NULL,
  `resolve` varchar(55) DEFAULT NULL,
  `resolve_time` varchar(55) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_dw_data_from_commercial_establishment`
--

INSERT INTO `amrut_dw_data_from_commercial_establishment` (`id`, `distric`, `sub_division`, `ulb_name`, `wand_no`, `habitation`, `location`, `market_establish_name`, `head_of_staff_nm`, `contact_no`, `user_type`, `no_of_shop`, `total_water_user`, `water_source`, `bulk_water`, `ground_water`, `func_water_meter`, `non_func_water_meter`, `unmeter`, `water_supply_time`, `consumption`, `complain`, `problem`, `resolve`, `resolve_time`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 15:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_dw_gen_data`
--

CREATE TABLE `amrut_dw_gen_data` (
  `id` int(13) NOT NULL,
  `distric` varchar(55) DEFAULT NULL,
  `sub_division` varchar(55) DEFAULT NULL,
  `ulb_name` varchar(55) DEFAULT NULL,
  `ward_no` varchar(55) DEFAULT NULL,
  `house_hold` varchar(55) DEFAULT NULL,
  `no_of_slum` varchar(55) DEFAULT NULL,
  `no_of_apartments` varchar(55) DEFAULT NULL,
  `no_of_society` varchar(55) DEFAULT NULL,
  `market_traditional` varchar(55) DEFAULT NULL,
  `market_shopping_mall` varchar(55) DEFAULT NULL,
  `unorganized_shops` varchar(55) DEFAULT NULL,
  `no_of_icds` varchar(55) DEFAULT NULL,
  `no_of_pry` varchar(55) DEFAULT NULL,
  `no_of_upper_pry` varchar(55) DEFAULT NULL,
  `no_of_college` varchar(55) DEFAULT NULL,
  `no_of_institute` varchar(55) DEFAULT NULL,
  `no_gov_office` varchar(55) DEFAULT NULL,
  `no_student_hostel` varchar(55) DEFAULT NULL,
  `no_other_hostel` varchar(55) DEFAULT NULL,
  `no_of_bus_stand` varchar(55) DEFAULT NULL,
  `no_of_railway_st` varchar(55) DEFAULT NULL,
  `no_of_airport` varchar(55) DEFAULT NULL,
  `no_of_river_ghat` varchar(55) DEFAULT NULL,
  `no_of_crematorium` varchar(55) DEFAULT NULL,
  `no_of_graveyard` varchar(55) DEFAULT NULL,
  `no_of_community_hall` varchar(55) DEFAULT NULL,
  `no_of_cinema_hall` varchar(55) DEFAULT NULL,
  `no_of_restaurant` varchar(55) DEFAULT NULL,
  `no_of_residential` varchar(55) DEFAULT NULL,
  `water_harvesting_unit` text DEFAULT NULL,
  `no_water_tank` varchar(55) DEFAULT NULL,
  `no_tube_well` varchar(55) DEFAULT NULL,
  `no_of_tap` varchar(55) DEFAULT NULL,
  `total_length_drain` varchar(55) DEFAULT NULL,
  `water_treatment_unit` varchar(55) DEFAULT NULL,
  `other_institution` varchar(55) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_dw_gen_data`
--

INSERT INTO `amrut_dw_gen_data` (`id`, `distric`, `sub_division`, `ulb_name`, `ward_no`, `house_hold`, `no_of_slum`, `no_of_apartments`, `no_of_society`, `market_traditional`, `market_shopping_mall`, `unorganized_shops`, `no_of_icds`, `no_of_pry`, `no_of_upper_pry`, `no_of_college`, `no_of_institute`, `no_gov_office`, `no_student_hostel`, `no_other_hostel`, `no_of_bus_stand`, `no_of_railway_st`, `no_of_airport`, `no_of_river_ghat`, `no_of_crematorium`, `no_of_graveyard`, `no_of_community_hall`, `no_of_cinema_hall`, `no_of_restaurant`, `no_of_residential`, `water_harvesting_unit`, `no_water_tank`, `no_tube_well`, `no_of_tap`, `total_length_drain`, `water_treatment_unit`, `other_institution`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 15:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_dw_house_hold_level_data`
--

CREATE TABLE `amrut_dw_house_hold_level_data` (
  `id` int(13) NOT NULL,
  `distric` varchar(55) DEFAULT NULL,
  `sub_division` varchar(55) DEFAULT NULL,
  `ulb_name` varchar(55) DEFAULT NULL,
  `wand_no` varchar(55) DEFAULT NULL,
  `habitation` varchar(55) DEFAULT NULL,
  `holding_no` varchar(55) DEFAULT NULL,
  `head_of_family` varchar(55) DEFAULT NULL,
  `contact_no` varchar(55) DEFAULT NULL,
  `user_type` varchar(55) DEFAULT NULL,
  `total_family` varchar(55) DEFAULT NULL,
  `male` varchar(55) DEFAULT NULL,
  `female` varchar(55) DEFAULT NULL,
  `child` varchar(55) DEFAULT NULL,
  `water_source` varchar(55) DEFAULT NULL,
  `domestic_water` varchar(55) DEFAULT NULL,
  `size_ground_water` varchar(55) DEFAULT NULL,
  `func_water_meter` varchar(55) DEFAULT NULL,
  `non_func_water_meter` varchar(55) DEFAULT NULL,
  `unmeter` varchar(55) DEFAULT NULL,
  `total_water_time` varchar(55) DEFAULT NULL,
  `approx_consumption` varchar(55) DEFAULT NULL,
  `complain_on_water` varchar(55) DEFAULT NULL,
  `problem` varchar(55) DEFAULT NULL,
  `resolve` varchar(55) DEFAULT NULL,
  `resolve_time` varchar(55) DEFAULT NULL,
  `any_multi_user` varchar(55) DEFAULT NULL,
  `same_data_sep_sheet` varchar(55) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_dw_house_hold_level_data`
--

INSERT INTO `amrut_dw_house_hold_level_data` (`id`, `distric`, `sub_division`, `ulb_name`, `wand_no`, `habitation`, `holding_no`, `head_of_family`, `contact_no`, `user_type`, `total_family`, `male`, `female`, `child`, `water_source`, `domestic_water`, `size_ground_water`, `func_water_meter`, `non_func_water_meter`, `unmeter`, `total_water_time`, `approx_consumption`, `complain_on_water`, `problem`, `resolve`, `resolve_time`, `any_multi_user`, `same_data_sep_sheet`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 15:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_dw_institution_data`
--

CREATE TABLE `amrut_dw_institution_data` (
  `si_id` int(11) NOT NULL,
  `district` varchar(100) DEFAULT NULL,
  `sub_division` varchar(200) DEFAULT NULL,
  `ulb_name` varchar(200) DEFAULT NULL,
  `ward_no` varchar(200) DEFAULT NULL,
  `si_habitation_name` varchar(200) DEFAULT NULL,
  `si_location` varchar(200) DEFAULT NULL,
  `si_institute_name` varchar(200) DEFAULT NULL,
  `si_stuff_head` varchar(200) DEFAULT NULL,
  `si_contact_no` varchar(20) DEFAULT NULL,
  `si_user_type` varchar(200) DEFAULT NULL,
  `si_water_user_no` varchar(200) DEFAULT NULL,
  `si_drinking_water_source_type` varchar(200) DEFAULT NULL,
  `si_ulb_bulk_water_connection` varchar(200) DEFAULT NULL,
  `si_ground_water_tank_size` varchar(200) DEFAULT NULL,
  `si_functional_watermeter_ferrule` varchar(200) DEFAULT NULL,
  `si_non_functional_watermeter_ferrule` varchar(200) DEFAULT NULL,
  `si_unmeter` varchar(200) DEFAULT NULL,
  `si_total_water_supply_time` varchar(200) DEFAULT NULL,
  `si_all_user_approx_consumption` varchar(200) DEFAULT NULL,
  `si_drinking_water_ulb_complain` varchar(200) DEFAULT NULL,
  `si_problem_type` varchar(200) DEFAULT NULL,
  `si_is_resolved` varchar(200) DEFAULT NULL,
  `si_resolve_time` varchar(200) DEFAULT NULL,
  `si_created_by` varchar(200) DEFAULT NULL,
  `si_created_on` datetime DEFAULT NULL,
  `si_status` smallint(1) DEFAULT 1,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amrut_dw_institution_data`
--

INSERT INTO `amrut_dw_institution_data` (`si_id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `si_habitation_name`, `si_location`, `si_institute_name`, `si_stuff_head`, `si_contact_no`, `si_user_type`, `si_water_user_no`, `si_drinking_water_source_type`, `si_ulb_bulk_water_connection`, `si_ground_water_tank_size`, `si_functional_watermeter_ferrule`, `si_non_functional_watermeter_ferrule`, `si_unmeter`, `si_total_water_supply_time`, `si_all_user_approx_consumption`, `si_drinking_water_ulb_complain`, `si_problem_type`, `si_is_resolved`, `si_resolve_time`, `si_created_by`, `si_created_on`, `si_status`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '45', NULL, NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, NULL, 'null', 'null', 'null', NULL, NULL, NULL, NULL, 'null', NULL, NULL, NULL, 1, 27, 1, '2022-06-30 20:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_dw_ward_wise_data`
--

CREATE TABLE `amrut_dw_ward_wise_data` (
  `id` int(11) NOT NULL,
  `district` varchar(200) DEFAULT NULL,
  `sub_division` varchar(200) DEFAULT NULL,
  `ulb_name` varchar(200) DEFAULT NULL,
  `ward_no` varchar(200) DEFAULT NULL,
  `swmci_no_house_hold` varchar(200) DEFAULT NULL,
  `swmci_no_slum` varchar(200) DEFAULT NULL,
  `swmci_no_apartment` varchar(200) DEFAULT NULL,
  `swmci_no_socity_houseingcomplex` varchar(200) DEFAULT NULL,
  `swmci_no_market_traditional` varchar(200) DEFAULT NULL,
  `swmci_no_shop_trad` varchar(200) DEFAULT NULL,
  `swmci_no_market_shopping_mall` varchar(200) DEFAULT NULL,
  `swmci_no_shop_mall` varchar(200) DEFAULT NULL,
  `swmci_no_unorganized_shop` varchar(200) DEFAULT NULL,
  `swmci_no_icds` varchar(200) DEFAULT NULL,
  `swmci_no_student_icds` varchar(200) DEFAULT NULL,
  `swmci_no_primary_school_ssk` varchar(200) DEFAULT NULL,
  `swmci_no_student_school_ssk` varchar(200) DEFAULT NULL,
  `swmci_no_upper_primary_school` varchar(200) DEFAULT NULL,
  `swmci_no_student_upper_primary_school` varchar(200) DEFAULT NULL,
  `swmci_no_college` varchar(200) DEFAULT NULL,
  `swmci_no_student_college` varchar(200) DEFAULT NULL,
  `swmci_no_other_educational_institute` varchar(200) DEFAULT NULL,
  `swmci_no_student_other_institute` varchar(200) DEFAULT NULL,
  `swmci_no_govt_office` varchar(200) DEFAULT NULL,
  `swmci_no_employee` varchar(200) DEFAULT NULL,
  `swmci_no_student_hostel` varchar(200) DEFAULT NULL,
  `swmci_no_student_in_hostel` varchar(200) DEFAULT NULL,
  `swmci_no_other_hostel` varchar(200) DEFAULT NULL,
  `swmci_no_resident` varchar(200) DEFAULT NULL,
  `swmci_no_bus_stand` varchar(200) DEFAULT NULL,
  `swmci_no_rly_station` varchar(200) DEFAULT NULL,
  `swmci_no_airport` varchar(200) DEFAULT NULL,
  `swmci_no_river_ghar` varchar(200) DEFAULT NULL,
  `swmci_no_crematorium` varchar(200) DEFAULT NULL,
  `swmci_no_graveyard` varchar(200) DEFAULT NULL,
  `swmci_no_community_hall` varchar(200) DEFAULT NULL,
  `swmci_no_cinema_hall` varchar(200) DEFAULT NULL,
  `swmci_no_resturent` varchar(200) DEFAULT NULL,
  `swmci_no_residential_hotel` varchar(200) DEFAULT NULL,
  `swmci_no_rwh_unit` varchar(200) DEFAULT NULL,
  `swmci_no_water_tank_pond_water_body` varchar(200) DEFAULT NULL,
  `swmci_no_hand_pump` varchar(200) DEFAULT NULL,
  `swmci_no_tap` varchar(200) DEFAULT NULL,
  `swmci_no_conn_for_dw_pipeline` varchar(200) DEFAULT NULL,
  `swmci_no_connection_water_meter` varchar(200) DEFAULT NULL,
  `swmci_no_connection_water_meter_nf` varchar(200) DEFAULT NULL,
  `swmci_no_water_pump` varchar(200) DEFAULT NULL,
  `swmci_total_hour_water_supply_per_day` varchar(200) DEFAULT NULL,
  `swmci_total_drain_length` varchar(200) DEFAULT NULL,
  `swmci_no_stp_other_waste_tret_unit` varchar(200) DEFAULT NULL,
  `swmci_no_without_toilet_house` varchar(200) DEFAULT NULL,
  `swmci_no_septic_tank` varchar(200) DEFAULT NULL,
  `swmci_no_septic_tank_with_out_sock_pit` varchar(200) DEFAULT NULL,
  `swmci_other` varchar(200) DEFAULT NULL,
  `swmci_created_by` varchar(200) DEFAULT NULL,
  `swmci_created_on` varchar(200) DEFAULT NULL,
  `swmci_status` smallint(1) NOT NULL DEFAULT 1,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `amrut_dw_ward_wise_data`
--

INSERT INTO `amrut_dw_ward_wise_data` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `swmci_no_house_hold`, `swmci_no_slum`, `swmci_no_apartment`, `swmci_no_socity_houseingcomplex`, `swmci_no_market_traditional`, `swmci_no_shop_trad`, `swmci_no_market_shopping_mall`, `swmci_no_shop_mall`, `swmci_no_unorganized_shop`, `swmci_no_icds`, `swmci_no_student_icds`, `swmci_no_primary_school_ssk`, `swmci_no_student_school_ssk`, `swmci_no_upper_primary_school`, `swmci_no_student_upper_primary_school`, `swmci_no_college`, `swmci_no_student_college`, `swmci_no_other_educational_institute`, `swmci_no_student_other_institute`, `swmci_no_govt_office`, `swmci_no_employee`, `swmci_no_student_hostel`, `swmci_no_student_in_hostel`, `swmci_no_other_hostel`, `swmci_no_resident`, `swmci_no_bus_stand`, `swmci_no_rly_station`, `swmci_no_airport`, `swmci_no_river_ghar`, `swmci_no_crematorium`, `swmci_no_graveyard`, `swmci_no_community_hall`, `swmci_no_cinema_hall`, `swmci_no_resturent`, `swmci_no_residential_hotel`, `swmci_no_rwh_unit`, `swmci_no_water_tank_pond_water_body`, `swmci_no_hand_pump`, `swmci_no_tap`, `swmci_no_conn_for_dw_pipeline`, `swmci_no_connection_water_meter`, `swmci_no_connection_water_meter_nf`, `swmci_no_water_pump`, `swmci_total_hour_water_supply_per_day`, `swmci_total_drain_length`, `swmci_no_stp_other_waste_tret_unit`, `swmci_no_without_toilet_house`, `swmci_no_septic_tank`, `swmci_no_septic_tank_with_out_sock_pit`, `swmci_other`, `swmci_created_by`, `swmci_created_on`, `swmci_status`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45', NULL, NULL, NULL, NULL, NULL, NULL, 1, 27, 1, '2022-06-30 21:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_rwh_central_data_on_rain_water_harvesting`
--

CREATE TABLE `amrut_rwh_central_data_on_rain_water_harvesting` (
  `id` int(11) NOT NULL,
  `district` varchar(200) DEFAULT NULL,
  `sub_division` varchar(200) DEFAULT NULL,
  `ulb_name` varchar(200) DEFAULT NULL,
  `num_exist_unit_rainwater_harverst` varchar(200) DEFAULT NULL,
  `cov_rainwater_harvest_structure` varchar(200) DEFAULT NULL,
  `num_prop_rwh_structure` varchar(200) DEFAULT NULL,
  `city_gov_completed_rwh_project` varchar(200) DEFAULT NULL,
  `num_rwh_proj_completed_fin_year` varchar(200) DEFAULT NULL,
  `is_ulb_link_rwh_structure_data_with_prop_db` varchar(200) DEFAULT NULL,
  `is_ulb_check_funct_rwh_structure` varchar(200) DEFAULT NULL,
  `num_non_func_rwh_structures` varchar(200) DEFAULT NULL,
  `info_rainwater_stakeholders` varchar(200) DEFAULT NULL,
  `thr_hv_any_by_law_rwh` varchar(200) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_rwh_central_data_on_rain_water_harvesting`
--

INSERT INTO `amrut_rwh_central_data_on_rain_water_harvesting` (`id`, `district`, `sub_division`, `ulb_name`, `num_exist_unit_rainwater_harverst`, `cov_rainwater_harvest_structure`, `num_prop_rwh_structure`, `city_gov_completed_rwh_project`, `num_rwh_proj_completed_fin_year`, `is_ulb_link_rwh_structure_data_with_prop_db`, `is_ulb_check_funct_rwh_structure`, `num_non_func_rwh_structures`, `info_rainwater_stakeholders`, `thr_hv_any_by_law_rwh`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 17:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_rwh_data_on_rain_water_harvesting_unit`
--

CREATE TABLE `amrut_rwh_data_on_rain_water_harvesting_unit` (
  `id` int(11) NOT NULL,
  `name_of_rwh_unit` varchar(200) DEFAULT NULL,
  `type_of_rwh_unit` varchar(200) DEFAULT NULL,
  `owner_of_unit_1` varchar(200) DEFAULT NULL,
  `is_functional` varchar(10) DEFAULT NULL,
  `tech_or_method` varchar(200) DEFAULT NULL,
  `storage_capacity` varchar(200) DEFAULT NULL,
  `user_for` varchar(200) DEFAULT NULL,
  `owner_of_unit` varchar(200) DEFAULT NULL,
  `is_any_lab_test_report_found` varchar(200) DEFAULT NULL,
  `any_plan_for_extension` varchar(200) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_rwh_data_on_rain_water_harvesting_unit`
--

INSERT INTO `amrut_rwh_data_on_rain_water_harvesting_unit` (`id`, `name_of_rwh_unit`, `type_of_rwh_unit`, `owner_of_unit_1`, `is_functional`, `tech_or_method`, `storage_capacity`, `user_for`, `owner_of_unit`, `is_any_lab_test_report_found`, `any_plan_for_extension`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'ghgh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 17:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_waste_water_basic_data_from_mun`
--

CREATE TABLE `amrut_waste_water_basic_data_from_mun` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `total_drain_length` varchar(50) DEFAULT NULL,
  `house_hold_no` varchar(50) DEFAULT NULL,
  `house_hold_with_drain` varchar(50) DEFAULT NULL,
  `market_no` varchar(50) DEFAULT NULL,
  `market_with_drain` varchar(50) DEFAULT NULL,
  `institution_no` varchar(50) DEFAULT NULL,
  `institution_with_drain` varchar(50) DEFAULT NULL,
  `public_urinal_no` varchar(50) DEFAULT NULL,
  `public_urinal_with_drain` varchar(50) DEFAULT NULL,
  `community_sanitary_complex_no` varchar(50) DEFAULT NULL,
  `community_sanitary_complex_with_drain` varchar(50) DEFAULT NULL,
  `housing_complex` varchar(50) DEFAULT NULL,
  `housing_complex_with_drain` varchar(50) DEFAULT NULL,
  `special_drain_for_waste_water` varchar(50) DEFAULT NULL,
  `special_drain_for_storm_water` varchar(50) DEFAULT NULL,
  `tap_point_no` varchar(50) DEFAULT NULL,
  `tap_point_with_drain` varchar(50) DEFAULT NULL,
  `tubewell_no` varchar(50) DEFAULT NULL,
  `tubewell_with_drain` varchar(50) DEFAULT NULL,
  `septic_tank` varchar(50) DEFAULT NULL,
  `septic_tank_with_drain` varchar(50) DEFAULT NULL,
  `cesspool_no` varchar(50) DEFAULT NULL,
  `fstp_no` varchar(50) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_waste_water_basic_data_from_mun`
--

INSERT INTO `amrut_waste_water_basic_data_from_mun` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `total_drain_length`, `house_hold_no`, `house_hold_with_drain`, `market_no`, `market_with_drain`, `institution_no`, `institution_with_drain`, `public_urinal_no`, `public_urinal_with_drain`, `community_sanitary_complex_no`, `community_sanitary_complex_with_drain`, `housing_complex`, `housing_complex_with_drain`, `special_drain_for_waste_water`, `special_drain_for_storm_water`, `tap_point_no`, `tap_point_with_drain`, `tubewell_no`, `tubewell_with_drain`, `septic_tank`, `septic_tank_with_drain`, `cesspool_no`, `fstp_no`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 21:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_waste_water_central_data_on_sanitation_and_sewerage`
--

CREATE TABLE `amrut_waste_water_central_data_on_sanitation_and_sewerage` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `total_properties_in_city_sanitation` varchar(10) DEFAULT NULL,
  `properties_with_toilets` varchar(50) DEFAULT NULL,
  `dependent_on_community_toilets` varchar(50) DEFAULT NULL,
  `properties_with_access_to_toilets` varchar(10) DEFAULT NULL,
  `total_properties_in_city_sewage` varchar(10) DEFAULT NULL,
  `properties_with_sewer_connections` varchar(50) DEFAULT NULL,
  `properties_with_onsite_sanitary_disposal` varchar(50) DEFAULT NULL,
  `domestic_water_consumed` varchar(50) DEFAULT NULL,
  `apartments_water_consumed` varchar(10) DEFAULT NULL,
  `societies_water_consumed` varchar(10) DEFAULT NULL,
  `non_domestic_water_consumed` varchar(10) DEFAULT NULL,
  `public_taps_water_consumed` varchar(10) DEFAULT NULL,
  `water_from_free_supplies` varchar(10) DEFAULT NULL,
  `other_ulb_sources_water_consumed` varchar(10) DEFAULT NULL,
  `non_ulb_water_consumed` varchar(10) DEFAULT NULL,
  `total_water_consumption_from_ulb_n_non_ulb` varchar(10) DEFAULT NULL,
  `domestic_waste_water` varchar(10) DEFAULT NULL,
  `apartments_waste_water` varchar(10) DEFAULT NULL,
  `societies_waste_water` varchar(5) DEFAULT NULL,
  `non_domestic_waste_water` varchar(10) DEFAULT NULL,
  `public_taps_waste_water` varchar(10) DEFAULT NULL,
  `waste_water_from_free_supplies` varchar(10) DEFAULT NULL,
  `waste_water_from_ulb_source` varchar(50) DEFAULT NULL,
  `waste_water_from_non_ulb_source` varchar(10) DEFAULT NULL,
  `total_waste_water_generated` varchar(50) DEFAULT NULL,
  `primary_plant_sewage` varchar(10) DEFAULT NULL,
  `secondary_plant_sewage` varchar(10) DEFAULT NULL,
  `total_water_at_sewage_treatment_plant` varchar(10) DEFAULT NULL,
  `primary_plant_capacity` varchar(50) DEFAULT NULL,
  `seconadry_plant_capacity` varchar(10) DEFAULT NULL,
  `total_installed_capacity` varchar(10) DEFAULT NULL,
  `total_waste_water_generated_at_sewage_plant` varchar(10) DEFAULT NULL,
  `secondary_plant_sewage_volume` varchar(10) DEFAULT NULL,
  `waste_water_reused_after_secondary_treatment` varchar(50) DEFAULT NULL,
  `effluent_samples_tasted` varchar(50) DEFAULT NULL,
  `effluent_samples_passed` varchar(10) DEFAULT NULL,
  `sewage_complaints_received` varchar(10) DEFAULT NULL,
  `sewage_complaints_resolved` varchar(10) DEFAULT NULL,
  `regular_staff` varchar(10) DEFAULT NULL,
  `contract_staff_costs` varchar(10) DEFAULT NULL,
  `fuel_costs` varchar(10) DEFAULT NULL,
  `chemical_costs` varchar(10) DEFAULT NULL,
  `maintenance_costs` varchar(10) DEFAULT NULL,
  `contractor_costs` varchar(10) DEFAULT NULL,
  `others` varchar(10) DEFAULT NULL,
  `total_annual_operating_expenses` varchar(10) DEFAULT NULL,
  `beginning_year_arrears` varchar(10) DEFAULT NULL,
  `revenue_from_users` varchar(10) DEFAULT NULL,
  `revenue_from_tax` varchar(10) DEFAULT NULL,
  `revenue_from_other_sources` varchar(50) DEFAULT NULL,
  `total_revenue_of_current_year` varchar(50) DEFAULT NULL,
  `total_revenue_of_sewage_collection` varchar(10) DEFAULT NULL,
  `collection_against_arrears` varchar(10) DEFAULT NULL,
  `collection_against_current_demand` varchar(10) DEFAULT NULL,
  `septage_management_of_ulb` varchar(10) DEFAULT NULL,
  `septage_machines_within_ulb` varchar(10) DEFAULT NULL,
  `private_septage_machines_licenced_by_ulb` varchar(10) DEFAULT NULL,
  `sewerage_connection_costs_for_general` varchar(10) DEFAULT NULL,
  `sewerage_connection_costs_for_urban_poor` varchar(10) DEFAULT NULL,
  `sewerage_connection_costs_for_institutional` varchar(10) DEFAULT NULL,
  `sewerage_connection_costs_for_commercial` varchar(10) DEFAULT NULL,
  `sewerage_connection_costs_for_industrial` varchar(10) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_waste_water_central_data_on_sanitation_and_sewerage`
--

INSERT INTO `amrut_waste_water_central_data_on_sanitation_and_sewerage` (`id`, `district`, `sub_division`, `ulb_name`, `total_properties_in_city_sanitation`, `properties_with_toilets`, `dependent_on_community_toilets`, `properties_with_access_to_toilets`, `total_properties_in_city_sewage`, `properties_with_sewer_connections`, `properties_with_onsite_sanitary_disposal`, `domestic_water_consumed`, `apartments_water_consumed`, `societies_water_consumed`, `non_domestic_water_consumed`, `public_taps_water_consumed`, `water_from_free_supplies`, `other_ulb_sources_water_consumed`, `non_ulb_water_consumed`, `total_water_consumption_from_ulb_n_non_ulb`, `domestic_waste_water`, `apartments_waste_water`, `societies_waste_water`, `non_domestic_waste_water`, `public_taps_waste_water`, `waste_water_from_free_supplies`, `waste_water_from_ulb_source`, `waste_water_from_non_ulb_source`, `total_waste_water_generated`, `primary_plant_sewage`, `secondary_plant_sewage`, `total_water_at_sewage_treatment_plant`, `primary_plant_capacity`, `seconadry_plant_capacity`, `total_installed_capacity`, `total_waste_water_generated_at_sewage_plant`, `secondary_plant_sewage_volume`, `waste_water_reused_after_secondary_treatment`, `effluent_samples_tasted`, `effluent_samples_passed`, `sewage_complaints_received`, `sewage_complaints_resolved`, `regular_staff`, `contract_staff_costs`, `fuel_costs`, `chemical_costs`, `maintenance_costs`, `contractor_costs`, `others`, `total_annual_operating_expenses`, `beginning_year_arrears`, `revenue_from_users`, `revenue_from_tax`, `revenue_from_other_sources`, `total_revenue_of_current_year`, `total_revenue_of_sewage_collection`, `collection_against_arrears`, `collection_against_current_demand`, `septage_management_of_ulb`, `septage_machines_within_ulb`, `private_septage_machines_licenced_by_ulb`, `sewerage_connection_costs_for_general`, `sewerage_connection_costs_for_urban_poor`, `sewerage_connection_costs_for_institutional`, `sewerage_connection_costs_for_commercial`, `sewerage_connection_costs_for_industrial`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-07-01 17:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_waste_water_house_hold_data`
--

CREATE TABLE `amrut_waste_water_house_hold_data` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `holding_no` varchar(50) DEFAULT NULL,
  `head_of_the_family` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `no_of_population` varchar(50) DEFAULT NULL,
  `personal_tubewell` varchar(50) DEFAULT NULL,
  `condition_of_tubewell` varchar(50) DEFAULT NULL,
  `toilet_type` varchar(50) DEFAULT NULL,
  `septic_tank_with_soack_pit` varchar(50) DEFAULT NULL,
  `capacity_of_septic_tank` varchar(50) DEFAULT NULL,
  `last_cleaning_date` varchar(50) DEFAULT NULL,
  `building_link_with_drain` varchar(50) DEFAULT NULL,
  `waste_water_per_day` varchar(50) DEFAULT NULL,
  `re_use_waste_water` varchar(50) DEFAULT NULL,
  `other_information` text DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_waste_water_house_hold_data`
--

INSERT INTO `amrut_waste_water_house_hold_data` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `location_name`, `holding_no`, `head_of_the_family`, `contact_no`, `no_of_population`, `personal_tubewell`, `condition_of_tubewell`, `toilet_type`, `septic_tank_with_soack_pit`, `capacity_of_septic_tank`, `last_cleaning_date`, `building_link_with_drain`, `waste_water_per_day`, `re_use_waste_water`, `other_information`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-30', NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 22:38:44');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_waste_water_institution_data`
--

CREATE TABLE `amrut_waste_water_institution_data` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `institution_name` varchar(50) DEFAULT NULL,
  `type_of_institution` varchar(50) DEFAULT NULL,
  `head_of_institution` varchar(50) DEFAULT NULL,
  `institution_head_contact_no` varchar(50) DEFAULT NULL,
  `type_of_building` varchar(50) DEFAULT NULL,
  `no_of_person_uses_building` varchar(50) DEFAULT NULL,
  `main_water_source` varchar(50) DEFAULT NULL,
  `any_tubewell` varchar(50) DEFAULT NULL,
  `tubewell_condition` varchar(50) DEFAULT NULL,
  `toilet_type` varchar(50) DEFAULT NULL,
  `septic_tank_with_soack_pit` varchar(50) DEFAULT NULL,
  `capacity_of_septic_tank` varchar(50) DEFAULT NULL,
  `last_cleaning_date` date DEFAULT NULL,
  `building_link_with_drain` varchar(50) DEFAULT NULL,
  `per_day_waste_water` varchar(50) DEFAULT NULL,
  `re_use_waste_water` varchar(50) DEFAULT NULL,
  `amount_of_re_use_waste_water` varchar(50) DEFAULT NULL,
  `other_information` text DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_waste_water_institution_data`
--

INSERT INTO `amrut_waste_water_institution_data` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `location_name`, `institution_name`, `type_of_institution`, `head_of_institution`, `institution_head_contact_no`, `type_of_building`, `no_of_person_uses_building`, `main_water_source`, `any_tubewell`, `tubewell_condition`, `toilet_type`, `septic_tank_with_soack_pit`, `capacity_of_septic_tank`, `last_cleaning_date`, `building_link_with_drain`, `per_day_waste_water`, `re_use_waste_water`, `amount_of_re_use_waste_water`, `other_information`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Own Pump', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 23:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_water_body_central_data`
--

CREATE TABLE `amrut_water_body_central_data` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `ulb_have_water_body` varchar(50) DEFAULT NULL,
  `no_of_existing_water_bodies` varchar(50) DEFAULT NULL,
  `total_area_of_water_bodies` varchar(50) DEFAULT NULL,
  `rejuvenated_of_water_bodies_from_november_2021` varchar(50) DEFAULT NULL,
  `no_of_rejuvenated_water_bodies_before_november` varchar(50) DEFAULT NULL,
  `total_area_of_rejuvenated_water_bodies_before_november_2021` varchar(50) DEFAULT NULL,
  `city_plan_to_rejunevated_water_bodies_nex_year` varchar(50) DEFAULT NULL,
  `ulb_conduct_pre_monsoon_cleaning` varchar(50) DEFAULT NULL,
  `no_of_ulb_pre_monsoon_cleaning` varchar(50) DEFAULT NULL,
  `use_water_bodies_for_specific_purpose` varchar(50) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_water_body_central_data`
--

INSERT INTO `amrut_water_body_central_data` (`id`, `district`, `sub_division`, `ulb_name`, `ulb_have_water_body`, `no_of_existing_water_bodies`, `total_area_of_water_bodies`, `rejuvenated_of_water_bodies_from_november_2021`, `no_of_rejuvenated_water_bodies_before_november`, `total_area_of_rejuvenated_water_bodies_before_november_2021`, `city_plan_to_rejunevated_water_bodies_nex_year`, `ulb_conduct_pre_monsoon_cleaning`, `no_of_ulb_pre_monsoon_cleaning`, `use_water_bodies_for_specific_purpose`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', 'Yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 19:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `amrut_water_body_wise_data`
--

CREATE TABLE `amrut_water_body_wise_data` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `name_of_water_body` varchar(50) DEFAULT NULL,
  `type_of_water_body` varchar(50) DEFAULT NULL,
  `main_prupose_of_use` varchar(50) DEFAULT NULL,
  `per_day_users` varchar(50) DEFAULT NULL,
  `water_body_area` varchar(50) DEFAULT NULL,
  `source_of_water` varchar(50) DEFAULT NULL,
  `parmanent_ghat` varchar(50) DEFAULT NULL,
  `waste_collection_in_ghat` varchar(50) DEFAULT NULL,
  `last_year_of_excavation` varchar(50) DEFAULT NULL,
  `overall_cleanness_of_water_body` varchar(50) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amrut_water_body_wise_data`
--

INSERT INTO `amrut_water_body_wise_data` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `location`, `name_of_water_body`, `type_of_water_body`, `main_prupose_of_use`, `per_day_users`, `water_body_area`, `source_of_water`, `parmanent_ghat`, `waste_collection_in_ghat`, `last_year_of_excavation`, `overall_cleanness_of_water_body`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 19:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_in` datetime DEFAULT NULL,
  `time_out` datetime DEFAULT NULL,
  `claimed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub_division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `name`, `sub_division_id`) VALUES
(5, 'COOCH BEHAR-I', 6),
(6, 'COOCH BEHAR-II', 6);

-- --------------------------------------------------------

--
-- Table structure for table `calender_master`
--

CREATE TABLE `calender_master` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` enum('weekoff','holiday') NOT NULL COMMENT 'weekoff,holiday',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calender_master`
--

INSERT INTO `calender_master` (`id`, `date`, `type`, `description`) VALUES
(1, '2022-04-03', 'weekoff', NULL),
(2, '2022-04-10', 'weekoff', NULL),
(3, '2022-04-17', 'weekoff', NULL),
(4, '2022-04-24', 'weekoff', NULL),
(5, '2022-04-20', 'holiday', 'holiday'),
(7, '2022-05-04', 'holiday', 'demo holiday'),
(8, '2022-04-29', 'holiday', 'test holiday'),
(9, '2022-04-25', 'holiday', 'test'),
(10, '2022-12-31', 'holiday', 'Foundation Day');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`) VALUES
(12, 'BIRBHUM'),
(13, 'PURULIA'),
(14, 'NADIA'),
(15, 'COOCH BEHAR'),
(16, 'JALPAIGURI'),
(17, 'ALIPURDUAR'),
(18, 'UTTAR DINAJPUR'),
(19, 'DAKSHIN DINAJPUR'),
(20, 'MALDA'),
(21, 'MURSHIDABAD'),
(22, 'BANKURA'),
(23, 'PURBA BARDHAMAN'),
(24, 'PASCHIM BARDHAMAN'),
(25, 'PASCHIM MEDINIPUR'),
(26, 'JHARGRAM'),
(27, 'PURBA MEDINIPUR'),
(28, 'HOWRAH'),
(29, 'HOOGHLY'),
(30, 'NORTH 24 PARGANAS'),
(31, 'SOUTH 24 PARGANAS'),
(32, 'SILIGURI MAHAKUMA PARISHAD'),
(33, 'KALIMPONG'),
(34, 'DARJEELING'),
(35, 'KOLKATA');

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `emp_id` int(11) NOT NULL,
  `emp_number` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `department_long` varchar(200) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `profile_picture` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`emp_id`, `emp_number`, `name`, `mobile`, `email`, `address`, `gender`, `department`, `department_long`, `designation`, `date_of_joining`, `profile_picture`) VALUES
(1, 'ASJADMIN0000', 'SANJOY CHOWDHURY', '8910376939', 'sanjoyc@aranaxweb.com', NULL, NULL, 'ADMIN', 'ADMIN', 'SUPER ADMIN', NULL, NULL),
(2, 'ASJADMIN0001', 'PRASUN KANTI DAS', '9434196143', 'wbasj@rediffmail.com', NULL, NULL, 'ADMIN', 'ADMIN', 'CEO', NULL, NULL),
(3, 'ASJADMIN0002', 'MAYA SARKAR DAS', '9434259320', 'call2maya@gmail.com', NULL, NULL, 'ADMIN', 'ADMIN', 'WORKING PRESIDENT', NULL, NULL),
(4, 'ASJSSSN0003', 'SHYAMALI PAUL', '7585889926', 'paulshyamalipaul@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'HEAD MISTRESS', NULL, NULL),
(5, 'ASJSSSN0004', 'SHRABANTI CHOWDHURY', '9123898649', 'cshrabanti56@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. HEAD MISTRESS', NULL, NULL),
(6, 'ASJSSSN0005', 'RUMA SAMANTA', '9735793975', 'manimandal9647@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(7, 'ASJSSSN0006', 'ARCHANA MANDAL (ROY)', '9679968745', 'archonaroy51@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(8, 'ASJSSSN0007', 'ANITA MAITY (BALA)', '8116505345', 'maityanita577@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(9, 'ASJSSSN0008', 'MADHURI GOSWAMI', '7076043871', 'madhurigoswamisssn@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(10, 'ASJSSSN0009', 'MOUMITA DHARA MONDAL', '8293597269', 'moumita.mondal8293@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(11, 'ASJSSSN0010', 'MANASHI PRADHAN', '9382960819', '', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(12, 'ASJSSSN0011', 'RUMA MONDAL', '', '', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(13, 'ASJSSSN0012', 'SAHELI CHAKRABORTY', '8373833224', 'saheli.chakraborty.tamluk@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER', NULL, NULL),
(14, 'ASJSSSN0013', 'SUBHADRA MAITY', '', '', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'NON TEACHING STAFF', NULL, NULL),
(15, 'ASJSSSN0014', 'MOUMITA SHEE', '8101731800', 'moumitashee78@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'OFFICE ASSISTANT', NULL, NULL),
(16, 'ASJSSSN0015', 'ASHRUKANA MAITY', '', '', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'NON TEACHING STAFF', NULL, NULL),
(17, 'ASJSSSN0016', 'BIDYA PRADHAN', '7076502243', '', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER (YOGA)', NULL, NULL),
(18, 'ASJSSSN0017', 'SUSANTA JANA', '9434990262', 'susantaknocking@gmail.com', NULL, NULL, 'SSSN', 'SARADAMOYEE SISHU SIKSHYA NIKETAN', 'ASST. TEACHER (DRAWING)', NULL, NULL),
(19, 'ASJSPMU0018', 'RIYA CHAKRABORTY', '7319104271', '', NULL, NULL, 'SPMU', 'STATE PROGRAMME MANAGEMENT UNIT', 'OFFICE SACHIB (JUNIOR)', NULL, NULL),
(20, 'ASJSPMU0019', 'BISWAJIT JANA', '8918797893', 'biswajitjana144@gmail.com', NULL, NULL, 'SPMU', 'STATE PROGRAMME MANAGEMENT UNIT', 'OFFICE,ACCOUNTANT', NULL, NULL),
(21, 'ASJWASH0020', 'LABANI BHOWMIK', '9593048502', 'labani1999.ce@gmail.com', NULL, NULL, 'WASH', 'WATER SANITATION AND HYGIENE', 'ENGINEER', NULL, NULL),
(22, 'ASJWASH0021', 'SUSMITA PRATIHAR', '7029875617', 'susmitapratihar32@gmail.com', NULL, NULL, 'WASH', 'WATER SANITATION AND HYGIENE', 'PROGRAAME MANAGER (URBAN)', NULL, NULL),
(23, 'ASJWASH0022', 'SOUMYA CHANDRA', '9064611771', '', NULL, NULL, 'WASH', 'WATER SANITATION AND HYGIENE', 'FIELD SUPERVISOR', NULL, NULL),
(24, 'ASJWASH0023', 'PUJA SAMUI', '8961914019', 'pujasamui992@gmail.com', NULL, NULL, 'WASH', 'WATER SANITATION AND HYGIENE', 'FIELD SUPERVISOR', NULL, NULL),
(25, 'ASJWASH0024', 'SUSMITA MANDAL', '7047403019', 'mandalsusmita374@gmail.com', NULL, NULL, 'WASH', 'WATER SANITATION AND HYGIENE', 'FIELD SUPERVISOR', NULL, NULL),
(26, 'ASJAMRUT0025', 'ROHIMA KHATUN', '9679725985', 'rohima9679@gmail.com', NULL, NULL, 'AMRUT', 'ATAL MISSION for REJUVENATION and URBAN TRANSFORMATION', 'PROGRAMME MANAGER (AMRUT)', NULL, NULL),
(27, 'ASJWASH0026', 'SUMAN GHOSH', '8296014228', 'sumang50@gmail.com', NULL, NULL, 'WASH', 'WATER, SANITATION AND HYGIENE', 'PROGRAMME MANAGER NDITA-NKDA-EKWMA', NULL, NULL),
(28, 'ASJWASH0027', 'ABDUL ALIM', '7797978788', '', NULL, NULL, 'WASH', 'WATER, SANITATION AND HYGIENE', 'REGIONAL SUPERVISOR', NULL, NULL),
(29, 'ASJSWM0028', 'HARADHAN MANDAL', '9434502790', 'angandisha121@gmail.com', NULL, NULL, 'SWM BANKURA', 'SOLID WASTE MANAGEMENT BANKURA', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(30, 'ASJSWM0029', 'BISWAJIT BANERJEE', '8967690001', 'biswajit36867@gmail.com', NULL, NULL, 'SWM BANKURA', 'SOLID WASTE MANAGEMENT BANKURA', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(31, 'ASJSWM0030', 'SUMAN MAHAPATRA', '9641165736', 'Sumanmahapatra521@gmail.com', NULL, NULL, 'SWM BANKURA', 'SOLID WASTE MANAGEMENT BANKURA', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(32, 'ASJSWM0031', 'SK.SIRAZUL ISLAM', '6290050916', 'skrahamansirajul1969@gmail.com', NULL, NULL, 'SWM NKDA', 'SOLID WASTE MANAGEMENT NKDA', 'PROGRAAME Co-ORDINATOR', NULL, NULL),
(33, 'ASJSWM0032', 'SUROJIT MANDAL', '8981198322', 'monsurajitdal@gmail.com', NULL, NULL, 'SWM NKDA', 'SOLID WASTE MANAGEMENT NKDA', 'PROGRAAME Co-ORDINATOR', NULL, NULL),
(34, 'ASJSWM0033', 'SOURYA SINHA', '8116998414', 'neelmelodious@gmail.com', NULL, NULL, 'SWM NKDA', 'SOLID WASTE MANAGEMENT NKDA', 'PROGRAAME Co-ORDINATOR', NULL, NULL),
(35, 'ASJSWM0034', 'NIRUPAM SANNYAL', '9830244889', 'mail-nirupamsanyall@gmail.com', NULL, NULL, 'SWM NKDA', 'SOLID WASTE MANAGEMENT NKDA', 'PROGRAAME Co-ORDINATOR', NULL, NULL),
(36, 'ASJDPR0035', 'SUMAN CHAKRABORTY', '9091263819', 'sc3896133@gmail.com', NULL, NULL, 'DPR TEAM', 'DETAILED PROJECT REPORT TEAM', 'FIELD STAFF & SURVEYOR', NULL, NULL),
(37, 'ASJDPR0036', 'APARNA KHANRA', '9330410663', 'kranraaparna76@gmail.com', NULL, NULL, 'DPR TEAM', 'DETAILED PROJECT REPORT TEAM', 'FIELD STAFF & SURVEYOR', NULL, NULL),
(38, 'ASJDPR0037', 'RINIKA MUKHERJEE', '9330035708', '', NULL, NULL, 'DPR TEAM', 'DETAILED PROJECT REPORT TEAM', 'FIELD STAFF & SURVEYOR', NULL, NULL),
(39, 'ASJDPR0038', 'SNEHA DAS', '8697312669', 'sdas77730@gmail.com', NULL, NULL, 'DPR TEAM', 'DETAILED PROJECT REPORT TEAM', 'FIELD STAFF & SURVEYOR', NULL, NULL),
(40, 'ASJSWM0039', 'RITA MANDAL', '8585032147', 'mondalrita98219@gmail.com', NULL, NULL, 'SWM NDITA', 'SOLID WASTE MANAGEMENT NDITA', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(41, 'ASJSWM0040', 'RUMA GANGULY', '8902606897', 'sonuganfuli@gmail.com', NULL, NULL, 'SWM NDITA', 'SOLID WASTE MANAGEMENT NDITA', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(42, 'ASJSWM0041', 'KOUSTAV MONDAL', '9732854440', 'koustav4all@gmail.com', NULL, NULL, 'SWM NDITA', 'SOLID WASTE MANAGEMENT NDITA', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(43, 'ASJMSWM0042', 'SOURAV MONDAL', '6294772722', 'smpd13599@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(44, 'ASJMSWM0043', 'SAGAR DAS', '7407151653', 'sagarsdas1322@gamil.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(45, 'ASJMSWM0044', 'TANMAY MANDAL', '6295254914', 'tanmaymandal6903@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(46, 'ASJMSWM0045', 'SUJOY DEY', '6295784930', 'sujoydey2275@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(47, 'ASJMSWM0046', 'SOURAV BARDHAN', '8250323378', 'souravbardhan1998@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(48, 'ASJMSWM0047', 'JOLLY DUTTA ', '6294498430', 'jollydutta82@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(49, 'ASJMSWM0048', 'BIKRAM SAHA', '6295712226', 'bikramsaha21@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(50, 'ASJMSWM0049', 'PINTU SAMADDAR', '6294042078', ' 130@gmail.com.', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(51, 'ASJMSWM0050', 'GUDDU SINGHA', '9800023717', 'guddusingha1992@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(52, 'ASJMSWM0051', 'PAPIYA DAS', '8158804955', ' 013@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(53, 'ASJMSWM0052', 'RAJLAKSHMI DUTTA', '7001504530', 'drajlakshmi2@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(54, 'ASJMSWM0053', 'MAMATA MALLICK', '7365995925', ' 10@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(55, 'ASJMSWM0054', 'BISWAJIT SAMANTA', '9732381447', 'biswajitsamanta157@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(56, 'ASJMSWM0055', 'SWARNALI MODAK', '7501292536', '  paulswarnali 1230@Gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(57, 'ASJMSWM0056', 'SRIMAN MUKHERJEE', '9547264998', ' srimanmukherjee917@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(58, 'ASJMSWM0057', 'BARNALI MODAK', '8942894558', 'modakbarnali092@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(59, 'ASJMSWM0058', 'SIPRA MONDAL', '9800023717', 'shipmondal102@gmail.com ', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(60, 'ASJMSWM0059', 'DURBA CHAKRABORTTY', '7797834331', 'chakrabortydurba2018@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(61, 'ASJMSWM0060', 'YUDHISTIR MONDAL', '9800009185', 'mandal.yudhisthir13@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(62, 'ASJMSWM0061', 'DIPANWITA DEY', '9647075038', 'deydipanwita153@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(63, 'ASJMSWM0062', 'SATABDI ROY', '9564666140', 'roysatabdi122@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(64, 'ASJMSWM0063', 'SK ABDUR RAKIB', '6294912461', 'skabdurrakib9083@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL),
(65, 'ASJMSWM0064', 'SRIDARSHAN GURUNG', '9732474030', 'sridarshangng46@gmail.com', NULL, NULL, 'MSWM', 'MUNCIPAL SOLID WASTE MANAGEMENT', 'PROGRAMME Co-ORDINATOR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gram_panchayats`
--

CREATE TABLE `gram_panchayats` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `block_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gram_panchayats`
--

INSERT INTO `gram_panchayats` (`id`, `name`, `block_id`) VALUES
(5, 'MOAMARI', 5),
(6, 'CHILKIRHAT', 5),
(7, 'FALIMARI', 5),
(8, 'PUTIMARI FULESWARI', 5),
(9, 'PATHCHARA', 5),
(10, 'HARIBHANGA', 5),
(11, 'GHUGHUMARI', 5),
(12, 'GURIYAHATI-I', 5),
(13, 'GURIYAHATI-II', 5),
(14, 'DAWAGURI', 5),
(15, 'PANISALA', 5),
(16, 'DEWANHAT', 5),
(17, 'JIRANPUR', 5),
(18, 'CHANDAMARI', 5),
(19, 'SUKTABARI', 5);

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `adjustment` date DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `comment` varchar(200) DEFAULT NULL,
  `reviewer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login_transaction`
--

CREATE TABLE `login_transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime DEFAULT NULL,
  `login_latitude` varchar(50) DEFAULT NULL,
  `login_longitude` varchar(50) DEFAULT NULL,
  `logout_time` datetime DEFAULT NULL,
  `logout_latitude` varchar(50) DEFAULT NULL,
  `logout_longitude` varchar(50) DEFAULT NULL,
  `user_type` enum('employee','surveyor') NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_transaction`
--

INSERT INTO `login_transaction` (`id`, `user_id`, `login_time`, `login_latitude`, `login_longitude`, `logout_time`, `logout_latitude`, `logout_longitude`, `user_type`) VALUES
(159, 9, '2022-07-01 21:43:30', '22.6003073', '88.4306861', NULL, NULL, NULL, 'employee'),
(160, 1, '2022-07-01 21:44:59', '22.5297', '88.3563', NULL, NULL, NULL, 'surveyor');

-- --------------------------------------------------------

--
-- Table structure for table `mswm_survey_for_house_hold`
--

CREATE TABLE `mswm_survey_for_house_hold` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(100) DEFAULT NULL,
  `ward_no` varchar(10) DEFAULT NULL,
  `head_of_family` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `husband_name` varchar(50) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `nature_of_resident` varchar(50) DEFAULT NULL,
  `permanent_resident` varchar(50) DEFAULT NULL,
  `permanent_resident_rented` varchar(50) DEFAULT NULL,
  `temporary_resident_rented` varchar(50) DEFAULT NULL,
  `other_type_resident` varchar(50) DEFAULT NULL,
  `family_members` varchar(50) DEFAULT NULL,
  `old_age_family` varchar(50) DEFAULT NULL,
  `females_14_to_50` varchar(50) DEFAULT NULL,
  `children_below_4` varchar(5) DEFAULT NULL,
  `building_category` varchar(50) DEFAULT NULL,
  `toilet_type` varchar(50) DEFAULT NULL,
  `septic_tank_cleaning_year` varchar(50) DEFAULT NULL,
  `septic_tank_with_sock_pit` varchar(50) DEFAULT NULL,
  `water_connection` varchar(50) DEFAULT NULL,
  `bulk_waste_generator` varchar(50) DEFAULT NULL,
  `waster_bin_received` varchar(50) DEFAULT NULL,
  `waste_collection_time` time DEFAULT NULL,
  `present_waste_collection` varchar(50) DEFAULT NULL,
  `wet_waste_generation` varchar(50) DEFAULT NULL,
  `dry_waste_generation` varchar(50) DEFAULT NULL,
  `bio_medical_waste_scope` varchar(50) DEFAULT NULL,
  `residence_of_commercial` varchar(50) DEFAULT NULL,
  `orient_on_municipal_waste_collection` varchar(50) DEFAULT NULL,
  `orient_on_source_segregation` varchar(50) DEFAULT NULL,
  `name_of_assign` varchar(50) DEFAULT NULL,
  `signature` varchar(200) DEFAULT NULL,
  `survey_id` int(11) NOT NULL,
  `surveyor_id` int(11) NOT NULL,
  `survey_response_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mswm_survey_for_house_hold`
--

INSERT INTO `mswm_survey_for_house_hold` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `head_of_family`, `father_name`, `husband_name`, `contact_number`, `nature_of_resident`, `permanent_resident`, `permanent_resident_rented`, `temporary_resident_rented`, `other_type_resident`, `family_members`, `old_age_family`, `females_14_to_50`, `children_below_4`, `building_category`, `toilet_type`, `septic_tank_cleaning_year`, `septic_tank_with_sock_pit`, `water_connection`, `bulk_waste_generator`, `waster_bin_received`, `waste_collection_time`, `present_waste_collection`, `wet_waste_generation`, `dry_waste_generation`, `bio_medical_waste_scope`, `residence_of_commercial`, `orient_on_municipal_waste_collection`, `orient_on_source_segregation`, `name_of_assign`, `signature`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(20, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '56', 'aaaaa', 'aaaaaaa', 'sssssss', NULL, 'tenant', 'no', NULL, NULL, NULL, '11', 'no', NULL, NULL, 'earthen', 'septic tank', '2022-07-20', 'yes', 'no', 'no', 'yes', '12:12:00', 'yes', '12', '12', 'yes', 'no', 'yes', 'yes', NULL, NULL, 27, 1, '2022-07-01 12:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `mswm_survey_for_market`
--

CREATE TABLE `mswm_survey_for_market` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `ward_number` varchar(50) DEFAULT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `business_name` varchar(50) DEFAULT NULL,
  `business_owner` varchar(50) DEFAULT NULL,
  `short_address` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `nature_of_business` varchar(50) DEFAULT NULL,
  `type_of_business` varchar(50) DEFAULT NULL,
  `total_employee` varchar(20) DEFAULT NULL,
  `toilet_type` varchar(80) DEFAULT NULL,
  `retrofitting_toilet` varchar(50) DEFAULT NULL,
  `generated_waste` varchar(50) DEFAULT NULL,
  `vegetable_waste` varchar(50) DEFAULT NULL,
  `fish_waste` varchar(50) DEFAULT NULL,
  `meat_waste` varchar(50) DEFAULT NULL,
  `present_waste_practices` varchar(100) DEFAULT NULL,
  `municipality_waste_bin` varchar(50) DEFAULT NULL,
  `it_is_adequate` varchar(50) DEFAULT NULL,
  `dustbin_available` varchar(50) DEFAULT NULL,
  `willing_to_pay_for_taking_waste` varchar(50) DEFAULT NULL,
  `waste_collection_time` varchar(50) DEFAULT NULL,
  `carry_bag_used` varchar(50) DEFAULT NULL,
  `can_give_money_for_carry` varchar(50) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mswm_survey_for_market`
--

INSERT INTO `mswm_survey_for_market` (`id`, `district`, `sub_division`, `ulb_name`, `ward_number`, `location_name`, `business_name`, `business_owner`, `short_address`, `category`, `contact_number`, `nature_of_business`, `type_of_business`, `total_employee`, `toilet_type`, `retrofitting_toilet`, `generated_waste`, `vegetable_waste`, `fish_waste`, `meat_waste`, `present_waste_practices`, `municipality_waste_bin`, `it_is_adequate`, `dustbin_available`, `willing_to_pay_for_taking_waste`, `waste_collection_time`, `carry_bag_used`, `can_give_money_for_carry`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(3, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '56', NULL, NULL, NULL, NULL, 'general', NULL, 'null', 'null', NULL, 'null', 'null', NULL, 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 27, 1, '2022-06-30 18:49:56'),
(4, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', NULL, NULL, NULL, NULL, NULL, 'null', NULL, 'null', 'null', NULL, 'null', 'null', NULL, 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 27, 1, '2022-07-01 22:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `mswm_survey_for_water_body`
--

CREATE TABLE `mswm_survey_for_water_body` (
  `id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `sub_division` varchar(50) DEFAULT NULL,
  `ulb_name` varchar(50) DEFAULT NULL,
  `ward_no` varchar(50) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `name_of_water_body` varchar(100) DEFAULT NULL,
  `type_of_water_body` varchar(50) DEFAULT NULL,
  `main_prupose_of_use` varchar(50) DEFAULT NULL,
  `per_day_users` varchar(50) DEFAULT NULL,
  `total_area_of_water_body` varchar(50) DEFAULT NULL,
  `source_of_water` varchar(50) DEFAULT NULL,
  `any_parmanent_ghat` varchar(50) DEFAULT NULL,
  `waste_collection_facility_in_ghat` varchar(50) DEFAULT NULL,
  `last_year_of_excavation` varchar(50) DEFAULT NULL,
  `overall_cleanness_of_water_body` varchar(50) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mswm_survey_for_water_body`
--

INSERT INTO `mswm_survey_for_water_body` (`id`, `district`, `sub_division`, `ulb_name`, `ward_no`, `location`, `name_of_water_body`, `type_of_water_body`, `main_prupose_of_use`, `per_day_users`, `total_area_of_water_body`, `source_of_water`, `any_parmanent_ghat`, `waste_collection_facility_in_ghat`, `last_year_of_excavation`, `overall_cleanness_of_water_body`, `surveyor_id`, `survey_id`, `survey_response_time`) VALUES
(1, 'NORTH 24 PARGANAS', 'BARASAT', 'Gobardanga', '56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 27, '2022-06-30 18:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `ndita_swm_daily_survey_data_on_segregation`
--

CREATE TABLE `ndita_swm_daily_survey_data_on_segregation` (
  `id` int(11) NOT NULL,
  `block_name` varchar(50) DEFAULT NULL,
  `street_number` varchar(50) DEFAULT NULL,
  `building_number` varchar(50) DEFAULT NULL,
  `building_name` varchar(50) DEFAULT NULL,
  `building_owner` varchar(50) DEFAULT NULL,
  `building_type` varchar(50) DEFAULT NULL,
  `use_of_building` varchar(50) DEFAULT NULL,
  `no_of_apartment` varchar(50) DEFAULT NULL,
  `building_caretaker_name` varchar(50) DEFAULT NULL,
  `building_caretaker_number` varchar(50) DEFAULT NULL,
  `meet_with_whom` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `population_of_building` varchar(50) DEFAULT NULL,
  `waste_per_day` varchar(50) DEFAULT NULL,
  `waste_disposal_practice` varchar(50) DEFAULT NULL,
  `have_waste_bin` varchar(50) DEFAULT NULL,
  `waste_collection_time` varchar(50) DEFAULT NULL,
  `scope_of_sanitary_waste_generation` varchar(50) DEFAULT NULL,
  `scope_of_bio_medical_waste_generation` varchar(50) DEFAULT NULL,
  `waste_collection_facility_provider` varchar(50) DEFAULT NULL,
  `waste_management_initiative_by_self` varchar(50) DEFAULT NULL,
  `daily_fresh_waste` varchar(50) DEFAULT NULL,
  `other_information` varchar(50) DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ndita_swm_daily_survey_data_on_segregation`
--

INSERT INTO `ndita_swm_daily_survey_data_on_segregation` (`id`, `block_name`, `street_number`, `building_number`, `building_name`, `building_owner`, `building_type`, `use_of_building`, `no_of_apartment`, `building_caretaker_name`, `building_caretaker_number`, `meet_with_whom`, `contact_no`, `population_of_building`, `waste_per_day`, `waste_disposal_practice`, `have_waste_bin`, `waste_collection_time`, `scope_of_sanitary_waste_generation`, `scope_of_bio_medical_waste_generation`, `waste_collection_facility_provider`, `waste_management_initiative_by_self`, `daily_fresh_waste`, `other_information`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(0, NULL, NULL, NULL, 'ganapati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 17:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `nkda_swm_daily_survey_data_on_segregation`
--

CREATE TABLE `nkda_swm_daily_survey_data_on_segregation` (
  `id` int(11) NOT NULL,
  `action_area` varchar(50) DEFAULT NULL,
  `block_name` varchar(50) DEFAULT NULL,
  `building_no` varchar(50) DEFAULT NULL,
  `building_name` varchar(50) DEFAULT NULL,
  `street_no` varchar(50) DEFAULT NULL,
  `building_owner` varchar(50) DEFAULT NULL,
  `building_type` varchar(50) DEFAULT NULL,
  `use_of_building` varchar(50) DEFAULT NULL,
  `no_of_apartment` varchar(50) DEFAULT NULL,
  `building_caretaker_name` varchar(50) DEFAULT NULL,
  `building_caretaker_no` varchar(50) DEFAULT NULL,
  `meet_with_whom` varchar(50) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `population_of_building` varchar(50) DEFAULT NULL,
  `per_day_waste` varchar(50) DEFAULT NULL,
  `waste_disposal_practice` varchar(50) DEFAULT NULL,
  `have_waste_bin` varchar(50) DEFAULT NULL,
  `sticker_for_waste_collection` varchar(50) DEFAULT NULL,
  `waste_collection_time` varchar(50) DEFAULT NULL,
  `scope_of_sanitary_waste` varchar(50) DEFAULT NULL,
  `scope_of_bio_medical_waste` varchar(50) DEFAULT NULL,
  `waste_collection_provider` varchar(50) DEFAULT NULL,
  `self_initiative_waste_management` varchar(50) DEFAULT NULL,
  `open_disposal_of_daily_fresh_waste` varchar(50) DEFAULT NULL,
  `other_information` text DEFAULT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `surveyor_id` int(11) DEFAULT NULL,
  `survey_response_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nkda_swm_daily_survey_data_on_segregation`
--

INSERT INTO `nkda_swm_daily_survey_data_on_segregation` (`id`, `action_area`, `block_name`, `building_no`, `building_name`, `street_no`, `building_owner`, `building_type`, `use_of_building`, `no_of_apartment`, `building_caretaker_name`, `building_caretaker_no`, `meet_with_whom`, `contact_no`, `population_of_building`, `per_day_waste`, `waste_disposal_practice`, `have_waste_bin`, `sticker_for_waste_collection`, `waste_collection_time`, `scope_of_sanitary_waste`, `scope_of_bio_medical_waste`, `waste_collection_provider`, `self_initiative_waste_management`, `open_disposal_of_daily_fresh_waste`, `other_information`, `survey_id`, `surveyor_id`, `survey_response_time`) VALUES
(1, NULL, NULL, 'ganapati', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 27, 1, '2022-06-30 16:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` smallint(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `description`, `is_active`) VALUES
(1, 'super admin', NULL, 1),
(2, 'admin', NULL, 1),
(3, 'project manager', NULL, 1),
(4, 'team member', NULL, 1),
(5, 'supervisor', NULL, 1),
(6, 'surveyor', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_divisions`
--

CREATE TABLE `sub_divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_divisions`
--

INSERT INTO `sub_divisions` (`id`, `name`, `district_id`) VALUES
(6, 'COOCH BEHAR SADAR', 15),
(7, 'DINHATA', 15),
(8, 'TUFANGANJ', 15),
(9, 'MATHABHANGA', 15),
(10, 'MEKHLIGANJ', 15),
(11, 'JALPAIGURI SADAR', 16),
(12, 'MAL', 16),
(13, 'ALIPURDUAR', 17),
(14, 'ISLAMPUR', 18),
(15, 'RAIGANJ', 18),
(16, 'GANGARAMPUR', 19),
(17, 'DAKSHIN DINAJPUR SADAR', 19),
(18, 'CHANCHAL', 20),
(19, 'MALDA SADAR', 20),
(20, 'MURSHIDABAD SADAR', 21),
(21, 'DOMKAL', 21),
(22, 'LALBAG', 21),
(23, 'KANDI', 21),
(24, 'JANGIPUR', 21),
(25, 'TEHATTA', 14),
(26, 'NADIA SADAR', 14),
(27, 'RANAGHAT', 14),
(28, 'KALYANI', 14),
(29, 'BIRBHUM SADAR', 12),
(30, 'BOLPUR', 12),
(31, 'RAMPURHAT', 12),
(32, 'PURULIA SADAR', 13),
(33, 'MANBAZAR', 13),
(34, 'JHALDA', 13),
(35, 'RAGHUNATHPUR', 13),
(36, 'BANKURA SADAR', 22),
(37, 'BISHNUPUR', 22),
(38, 'KHATRA', 22),
(39, 'PURBA BARDHAMAN SADAR (NORTH)', 23),
(40, 'PURBA BARDHAMAN SADAR (SOUTH)', 23),
(41, 'KALNA', 23),
(42, 'KATWA', 23),
(43, 'DURGAPUR', 24),
(44, 'ASANSOLE', 24),
(45, 'MEDINIPUR SADAR', 25),
(46, 'KHARAGPUR', 25),
(47, 'GHATAL', 25),
(48, 'JHARGRAM', 26),
(49, 'TAMLUK', 27),
(50, 'HALDIA', 27),
(51, 'EGRA', 27),
(52, 'CONTAI', 27),
(53, 'HOWRAH SADAR', 28),
(54, 'ULUBERIA', 28),
(55, 'HOOGHLY SADAR', 29),
(56, 'CHANDANNAGAR', 29),
(57, 'ARAMBAGH', 29),
(58, 'SRIRAMPUR', 29),
(59, 'BONGAON', 30),
(60, 'BARASAT', 30),
(61, 'BASIRHAT', 30),
(62, 'BARRACKPORE', 30),
(63, 'BIDHANNAGAR', 30),
(64, 'BARUIPUR', 31),
(65, 'KAKDWIP', 31),
(66, 'CANNING', 31),
(67, 'DIAMOND HARBOUR', 31),
(68, 'SOUTH 24 PARGANAS SADAR', 31),
(69, 'SILIGURI', 32),
(70, 'KALIMPONG', 33),
(71, 'KURSEONG', 34),
(72, 'MIRIK', 34),
(73, 'DARJEELING', 34),
(74, 'MEMARI', 23),
(75, 'ALIPORE', 31),
(76, 'JOYNAGAR', 31),
(77, 'KOLKATA', 35);

-- --------------------------------------------------------

--
-- Table structure for table `surveyor_master`
--

CREATE TABLE `surveyor_master` (
  `surveyor_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `profile_picture` varchar(200) DEFAULT NULL,
  `default_password` enum('0') NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surveyor_master`
--

INSERT INTO `surveyor_master` (`surveyor_id`, `name`, `email`, `phone`, `password`, `address`, `gender`, `is_active`, `profile_picture`, `default_password`, `created_at`, `updated_at`) VALUES
(1, 'ukp', NULL, '9382492931', '#ukp1992', NULL, 'male', 1, NULL, '', NULL, '2022-04-19 14:01:23'),
(2, 'Bappa', NULL, '5555555222', NULL, NULL, 'null', 1, NULL, '0', NULL, NULL),
(3, 'Tapan', NULL, '7777777773', NULL, NULL, 'null', 0, NULL, '0', NULL, '2022-04-19 15:55:04'),
(4, 'Susmita', NULL, '1112222224', NULL, NULL, 'null', 1, NULL, '0', NULL, NULL),
(5, 'Monika', NULL, '6666666666', NULL, NULL, 'null', 1, NULL, '0', NULL, NULL),
(6, 'Sumit Biswas', 'sumit@test.com', '6454645464', '6454645464', 'kolkata', 'male', 1, NULL, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_schedule`
--

CREATE TABLE `survey_schedule` (
  `id` int(11) NOT NULL,
  `survey_type_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `sub_division_id` int(11) DEFAULT NULL,
  `block_id` int(11) DEFAULT NULL,
  `ulb_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_survey` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_schedule`
--

INSERT INTO `survey_schedule` (`id`, `survey_type_id`, `district_id`, `sub_division_id`, `block_id`, `ulb_id`, `start_date`, `end_date`, `no_of_survey`) VALUES
(27, 16, 30, 60, NULL, 36, '2022-06-30', '2022-07-03', '20');

-- --------------------------------------------------------

--
-- Table structure for table `survey_types`
--

CREATE TABLE `survey_types` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_types`
--

INSERT INTO `survey_types` (`id`, `name`, `is_active`) VALUES
(1, 'amrut_dw_bulk_user_data', 1),
(2, 'amrut_dw_central_data_on_drinking_water', 1),
(3, 'amrut_dw_data_from_commercial_establishment', 1),
(4, 'amrut_dw_gen_data', 1),
(5, 'amrut_dw_house_hold_level_data', 1),
(6, 'amrut_dw_institution_data', 1),
(7, 'amrut_dw_ward_wise_data', 1),
(8, 'amrut_rwh_central_data_on_rain_water_harvesting', 1),
(9, 'amrut_rwh_data_on_rain_water_harvesting_unit', 1),
(10, 'amrut_waste_water_basic_data_from_mun', 1),
(11, 'amrut_waste_water_central_data_on_sanitation_and_sewerage', 1),
(12, 'amrut_waste_water_house_hold_data', 1),
(13, 'amrut_waste_water_institution_data', 1),
(14, 'amrut_water_body_central_data', 1),
(15, 'amrut_water_body_wise_data', 1),
(16, 'mswm_survey_for_house_hold', 1),
(17, 'mswm_survey_for_market', 1),
(18, 'mswm_survey_for_water_body', 1),
(19, 'ndita_swm_daily_survey_data_on_segregation', 1),
(20, 'nkda_swm_daily_survey_data_on_segregation', 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_users`
--

CREATE TABLE `survey_users` (
  `id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `surveyor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_users`
--

INSERT INTO `survey_users` (`id`, `survey_id`, `surveyor_id`) VALUES
(54, 27, 1),
(55, 27, 2),
(56, 27, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ulbs`
--

CREATE TABLE `ulbs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sub_division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ULB-Urban Local Bodies';

--
-- Dumping data for table `ulbs`
--

INSERT INTO `ulbs` (`id`, `name`, `sub_division_id`) VALUES
(1, 'Birnagar', 27),
(2, 'Cooper\'s Camp', 27),
(3, 'Taherpur', 27),
(4, 'Ranaghat', 27),
(5, 'Haringhata', 28),
(6, 'Chandrakona', 47),
(7, 'Ghatal', 47),
(8, 'Kharar', 47),
(9, 'Khirpai', 47),
(10, 'Ramjibanpur', 47),
(11, 'Kharagpur', 46),
(12, 'Mirik', 72),
(13, 'Jhargram', 48),
(14, 'Memari', 74),
(15, 'Rishra', 58),
(16, 'Srerampore', 58),
(17, 'Tarakeswar', 56),
(18, 'Uttarpara Kotrung', 58),
(19, 'Baruipur', 64),
(20, 'Rajpur Sonarpur', 64),
(21, 'Diamond Harbar', 67),
(22, 'Budge-Budge', 75),
(23, 'Maheshtala', 75),
(24, 'Pujali', 75),
(25, 'Kolkata Municipal Corporation', 77),
(26, 'Ashoknagar Kalyangarh', 60),
(27, 'Baduria', 61),
(28, 'Baranagar', 62),
(29, 'Barasat', 60),
(30, 'Bhatpara', 62),
(31, 'Bidhannagar Municipal Corporation', 63),
(32, 'Nabadiganta Industrial Township Authority', 63),
(33, 'Bangaon', 59),
(34, 'Dumdum', 62),
(35, 'Gurulia', 62),
(36, 'Gobardanga', 60),
(37, 'Habra', 60),
(38, 'Halisahar', 62),
(39, 'Kamarhati', 62),
(40, 'Kanchrapara', 62),
(41, 'Khardah', 62),
(42, 'Madhyamgram', 60),
(43, 'Naihati', 62),
(44, 'New Barrackpore', 62),
(45, 'North Barrackpore', 62),
(46, 'North Dumdum', 62),
(47, 'Panihati', 62),
(48, 'South Damdam', 62),
(49, 'Barrackpore', 62),
(50, 'Basirhat', 61),
(51, 'Taki', 61),
(52, 'Titagarh', 62);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `emp_number` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `default_password` tinyint(1) NOT NULL DEFAULT 1,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `emp_number`, `password`, `default_password`, `role_id`) VALUES
(8, 'ASJADMIN0000', 'ASJADMIN0000', 1, 1),
(9, 'ASJADMIN0001', 'ASJADMIN0001', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `work_activity`
--

CREATE TABLE `work_activity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_master`
--
ALTER TABLE `activity_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_dw_bulk_user_data`
--
ALTER TABLE `amrut_dw_bulk_user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_dw_central_data_on_drinking_water`
--
ALTER TABLE `amrut_dw_central_data_on_drinking_water`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_dw_data_from_commercial_establishment`
--
ALTER TABLE `amrut_dw_data_from_commercial_establishment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_dw_gen_data`
--
ALTER TABLE `amrut_dw_gen_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_dw_house_hold_level_data`
--
ALTER TABLE `amrut_dw_house_hold_level_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_dw_institution_data`
--
ALTER TABLE `amrut_dw_institution_data`
  ADD PRIMARY KEY (`si_id`);

--
-- Indexes for table `amrut_dw_ward_wise_data`
--
ALTER TABLE `amrut_dw_ward_wise_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_rwh_central_data_on_rain_water_harvesting`
--
ALTER TABLE `amrut_rwh_central_data_on_rain_water_harvesting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_rwh_data_on_rain_water_harvesting_unit`
--
ALTER TABLE `amrut_rwh_data_on_rain_water_harvesting_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_waste_water_basic_data_from_mun`
--
ALTER TABLE `amrut_waste_water_basic_data_from_mun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_waste_water_central_data_on_sanitation_and_sewerage`
--
ALTER TABLE `amrut_waste_water_central_data_on_sanitation_and_sewerage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_waste_water_house_hold_data`
--
ALTER TABLE `amrut_waste_water_house_hold_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_waste_water_institution_data`
--
ALTER TABLE `amrut_waste_water_institution_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_water_body_central_data`
--
ALTER TABLE `amrut_water_body_central_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amrut_water_body_wise_data`
--
ALTER TABLE `amrut_water_body_wise_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_division_id` (`sub_division_id`);

--
-- Indexes for table `calender_master`
--
ALTER TABLE `calender_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `emp_number` (`emp_number`);

--
-- Indexes for table `gram_panchayats`
--
ALTER TABLE `gram_panchayats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `block_id` (`block_id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reviewer` (`reviewer`);

--
-- Indexes for table `login_transaction`
--
ALTER TABLE `login_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mswm_survey_for_house_hold`
--
ALTER TABLE `mswm_survey_for_house_hold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mswm_survey_for_market`
--
ALTER TABLE `mswm_survey_for_market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mswm_survey_for_water_body`
--
ALTER TABLE `mswm_survey_for_water_body`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nkda_swm_daily_survey_data_on_segregation`
--
ALTER TABLE `nkda_swm_daily_survey_data_on_segregation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sub_divisions`
--
ALTER TABLE `sub_divisions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `district` (`district_id`);

--
-- Indexes for table `surveyor_master`
--
ALTER TABLE `surveyor_master`
  ADD PRIMARY KEY (`surveyor_id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `survey_schedule`
--
ALTER TABLE `survey_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_types`
--
ALTER TABLE `survey_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_users`
--
ALTER TABLE `survey_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_id` (`survey_id`);

--
-- Indexes for table `ulbs`
--
ALTER TABLE `ulbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_division_id` (`sub_division_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `emp_number` (`emp_number`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `work_activity`
--
ALTER TABLE `work_activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `activity` (`activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_master`
--
ALTER TABLE `activity_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `amrut_dw_bulk_user_data`
--
ALTER TABLE `amrut_dw_bulk_user_data`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_dw_central_data_on_drinking_water`
--
ALTER TABLE `amrut_dw_central_data_on_drinking_water`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `amrut_dw_data_from_commercial_establishment`
--
ALTER TABLE `amrut_dw_data_from_commercial_establishment`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_dw_gen_data`
--
ALTER TABLE `amrut_dw_gen_data`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_dw_house_hold_level_data`
--
ALTER TABLE `amrut_dw_house_hold_level_data`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_dw_institution_data`
--
ALTER TABLE `amrut_dw_institution_data`
  MODIFY `si_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_dw_ward_wise_data`
--
ALTER TABLE `amrut_dw_ward_wise_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_rwh_central_data_on_rain_water_harvesting`
--
ALTER TABLE `amrut_rwh_central_data_on_rain_water_harvesting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_rwh_data_on_rain_water_harvesting_unit`
--
ALTER TABLE `amrut_rwh_data_on_rain_water_harvesting_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_waste_water_basic_data_from_mun`
--
ALTER TABLE `amrut_waste_water_basic_data_from_mun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_waste_water_central_data_on_sanitation_and_sewerage`
--
ALTER TABLE `amrut_waste_water_central_data_on_sanitation_and_sewerage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_waste_water_house_hold_data`
--
ALTER TABLE `amrut_waste_water_house_hold_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_waste_water_institution_data`
--
ALTER TABLE `amrut_waste_water_institution_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_water_body_central_data`
--
ALTER TABLE `amrut_water_body_central_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `amrut_water_body_wise_data`
--
ALTER TABLE `amrut_water_body_wise_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calender_master`
--
ALTER TABLE `calender_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `gram_panchayats`
--
ALTER TABLE `gram_panchayats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_transaction`
--
ALTER TABLE `login_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `mswm_survey_for_house_hold`
--
ALTER TABLE `mswm_survey_for_house_hold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mswm_survey_for_market`
--
ALTER TABLE `mswm_survey_for_market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mswm_survey_for_water_body`
--
ALTER TABLE `mswm_survey_for_water_body`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nkda_swm_daily_survey_data_on_segregation`
--
ALTER TABLE `nkda_swm_daily_survey_data_on_segregation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_divisions`
--
ALTER TABLE `sub_divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `surveyor_master`
--
ALTER TABLE `surveyor_master`
  MODIFY `surveyor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survey_schedule`
--
ALTER TABLE `survey_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `survey_types`
--
ALTER TABLE `survey_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `survey_users`
--
ALTER TABLE `survey_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `ulbs`
--
ALTER TABLE `ulbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `work_activity`
--
ALTER TABLE `work_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_ibfk_1` FOREIGN KEY (`sub_division_id`) REFERENCES `sub_divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gram_panchayats`
--
ALTER TABLE `gram_panchayats`
  ADD CONSTRAINT `gram_panchayats_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD CONSTRAINT `leave_applications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leave_applications_ibfk_2` FOREIGN KEY (`reviewer`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_divisions`
--
ALTER TABLE `sub_divisions`
  ADD CONSTRAINT `sub_divisions_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `survey_users`
--
ALTER TABLE `survey_users`
  ADD CONSTRAINT `survey_users_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey_schedule` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulbs`
--
ALTER TABLE `ulbs`
  ADD CONSTRAINT `ulbs_ibfk_1` FOREIGN KEY (`sub_division_id`) REFERENCES `sub_divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_number`) REFERENCES `employee_master` (`emp_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_activity`
--
ALTER TABLE `work_activity`
  ADD CONSTRAINT `work_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_activity_ibfk_2` FOREIGN KEY (`activity`) REFERENCES `activity_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
