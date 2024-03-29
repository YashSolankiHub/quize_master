-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 04:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quize_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `sr_no` int(2) NOT NULL,
  `enrollment` varchar(15) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `url` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `enrollment_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `sr_no` int(3) NOT NULL,
  `enrollment` varchar(15) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`sr_no`, `enrollment`, `student_name`, `password`, `mail_id`) VALUES
(1, '2304070100001', 'PATEL SANKET VIPULBHAI', '', 'example2304070100001@demo.com'),
(2, '2304070100002', 'AADITYA ANJANA', '', 'example2304070100002@demo.com'),
(3, '2304070100003', 'AAJAGIYA SHRUTI MANOJBHAI', '58401a6f96e7b0790ea9c94aa5fc7188', 'example2304070100003@demo.com'),
(4, '2304070100004', 'ANSARI MD KAIF SAGIR AHMED', '', 'example2304070100004@demo.com'),
(5, '2304070100005', 'ASODIYA ESVA KUMANBHAI', '', 'example2304070100005@demo.com'),
(6, '2304070100006', 'AWASTHI AYUSH VINODKUMAR', '8e5ec0eeffffc631cea4e86417bb719b', 'example2304070100006@demo.com'),
(7, '2304070100007', 'BAMBHAROLIYA KRINA RAJUBHAI', '', 'example2304070100007@demo.com'),
(8, '2304070100008', 'BAROT MIHIRKUMAR DIPAKBHAI', '', 'example2304070100008@demo.com'),
(9, '2304070100009', 'BHAVSAR ABHISHEK DINESHBHAI', '', 'example2304070100009@demo.com'),
(10, '2304070100010', 'BOGHARA DARSHAN RAGHAVBHAI', '', 'example2304070100010@demo.com'),
(11, '2304070100011', 'CHAUHAN ASHISH SADGURUCHARAN', '', 'example2304070100011@demo.com'),
(12, '2304070100012', 'CHAUHAN HARSH CHANDRAKANTBHAI', '', 'example2304070100012@demo.com'),
(13, '2304070100013', 'CHAUHAN PARTHIV PRAKASHBHAI', '', 'example2304070100013@demo.com'),
(14, '2304070100014', 'CHAUHAN SANIYA SALIMBHAI', '', 'example2304070100014@demo.com'),
(15, '2304070100015', 'CHAVDA KEYURSINH DILIPSINH', '', 'example2304070100015@demo.com'),
(16, '2304070100016', 'CHAVDA NIRAJ GOVINDBHAI', '', 'example2304070100016@demo.com'),
(17, '2304070100017', 'CHUDASAMA DHARMIK KALPESHBHAI', '', 'example2304070100017@demo.com'),
(18, '2304070100018', 'CHUDASAMA KRISHNA UMESHBHAI', '', 'example2304070100018@demo.com'),
(19, '2304070100019', 'CHUDASMA HARSHDEEP SINH BHARATSINH', '', 'example2304070100019@demo.com'),
(20, '2304070100020', 'DABHI AMAN NAGARBHAI', '', 'example2304070100020@demo.com'),
(21, '2304070100021', 'DAFDA ASHITA DEVJIBHAI', '', 'example2304070100021@demo.com'),
(22, '2304070100022', 'DAVE ARPIT DIVYAKANTBHAI', '', 'example2304070100022@demo.com'),
(23, '2304070100023', 'DAVE KUSH MAKARANDBHAI', '', 'example2304070100023@demo.com'),
(24, '2304070100024', 'DAVE MIHIR JAYESHKUMAR', '', 'example2304070100024@demo.com'),
(25, '2304070100025', 'DAVE VIVEK KAMLESHKUMAR', '', 'example2304070100025@demo.com'),
(26, '2304070100026', 'DESAI PRIYANSH AMRATBHAI', '', 'example2304070100026@demo.com'),
(27, '2304070100027', 'DESAI SHREYANK CHEHARBHAI', '', 'example2304070100027@demo.com'),
(28, '2304070100028', 'DESAI VISHVKUMAR RAMESHBHAI', '', 'example2304070100028@demo.com'),
(29, '2304070100029', 'DHAVAD BHAVESHKUMAR ASHOKBHAI', '', 'example2304070100029@demo.com'),
(30, '2304070100030', 'DHAVAD DISHA TULSIBHAI', '', 'example2304070100030@demo.com'),
(31, '2304070100031', 'DIPESH VIRJIBHAI CHAUHAN', '', 'example2304070100031@demo.com'),
(32, '2304070100032', 'DOBARIYA JENIL ARVINDBHAI', '', 'example2304070100032@demo.com'),
(33, '2304070100033', 'DOSHI DHAIRYA PARESHKUMAR', '', 'example2304070100033@demo.com'),
(34, '2304070100034', 'FULWARI ARON ROBERT', '', 'example2304070100034@demo.com'),
(35, '2304070100035', 'GAJJAR PARTH RAJESHKUMAR', '', 'example2304070100035@demo.com'),
(36, '2304070100036', 'GAJJAR RUSHABH PRAVINKUMAR', '', 'example2304070100036@demo.com'),
(37, '2304070100037', 'GONDALIYA HARIKRUSHNA NILESHBHAI', '', 'example2304070100037@demo.com'),
(38, '2304070100038', 'GOSAI BHAUTIKBHARTHI RATANBHARTHI', '', 'example2304070100038@demo.com'),
(39, '2304070100039', 'GUPTA HARSHKUMAR KASHIRAM', '', 'example2304070100039@demo.com'),
(40, '2304070100040', 'HADIYAL ANKIT TRIKLOKBHAI', '', 'example2304070100040@demo.com'),
(41, '2304070100041', 'JADEJA MAYURRAJSINH MAHAVIRSINH', '', 'example2304070100041@demo.com'),
(42, '2304070100042', 'JAMARIYA NILAMBEN KANJIBHAI', '249442fc472bf54a4e7f4aa59a413f46', 'nilamjamariya60@gmail.com'),
(43, '2304070100043', 'JANI PARTH DINKARKUMAR', '', 'example2304070100043@demo.com'),
(44, '2304070100044', 'JIVANI UTSAV PRAKASHBHAI', '', 'example2304070100044@demo.com'),
(45, '2304070100045', 'JOSHI JAHANVI MILANKUMAR', '', 'example2304070100045@demo.com'),
(46, '2304070100046', 'KAMANI NIVEDI JAGDISH', '', 'example2304070100046@demo.com'),
(47, '2304070100047', 'KANZARIYA SURYADEEP CHANDULAL', '', 'example2304070100047@demo.com'),
(48, '2304070100048', 'KATHIRIYA KUNJALBEN RAJESHKUMAR', '', 'example2304070100048@demo.com'),
(49, '2304070100049', 'KATHIRIYA RAJAN PRAKASHBHAI', '', 'example2304070100049@demo.com'),
(50, '2304070100050', 'KERALIYA PARTH BHARATBHAI', '', 'example2304070100050@demo.com'),
(51, '2304070100051', 'KHANDARE BHAGYASHREE MUKESHBHAI', '', 'example2304070100051@demo.com'),
(52, '2304070100052', 'KHATRI DHANANJAY MANOJBHAI', '', 'example2304070100052@demo.com'),
(53, '2304070100054', 'KORAT JAIMINKUMAR RAMJIBHAI', '', 'example2304070100054@demo.com'),
(54, '2304070100055', 'KORI RAVI RAJKUMAR', '', 'example2304070100055@demo.com'),
(55, '2304070100056', 'KOTHARI VIVEK VINUBHAI', '', 'example2304070100056@demo.com'),
(56, '2304070100057', 'LADANI MIRALIBEN MAHESHBHAI', '', 'example2304070100057@demo.com'),
(57, '2304070100058', 'LAKHAVANI DEEPAK SURESHBHAI', '60cfe3b14a401feed90aead5dee115a5', 'ys6244864@gmail.com'),
(58, '2304070100059', 'LALIT KUMAR', '', 'example2304070100059@demo.com'),
(59, '2304070100060', 'LUDARIYA KOMAL RAJUBHAI', '', 'example2304070100060@demo.com'),
(60, '2304070100061', 'MAHESHWARI MITALI SURESHKUMAR', '', 'example2304070100061@demo.com'),
(61, '2304070100062', 'MAKWANA DIPESH DINESHBHAI', '', 'example2304070100062@demo.com'),
(62, '2304070100063', 'MAKWANA PALAK DHARMESH BHAI', '', 'example2304070100063@demo.com'),
(63, '2304070100064', 'MAKWANA VIKASHKUMAR HARJIVANBHAI', '', 'example2304070100064@demo.com'),
(64, '2304070100065', 'MAKWANA YASH DEEPAKBHAI', '', 'example2304070100065@demo.com'),
(65, '2304070100066', 'MALAVIYA SANDIP RAMESHBHAI', '', 'example2304070100066@demo.com'),
(66, '2304070100067', 'MALVANIYA RUSHABH KISHORBHAI', '', 'example2304070100067@demo.com'),
(67, '2304070100068', 'MANEK SATISH GAGUBHA', '', 'example2304070100068@demo.com'),
(68, '2304070100069', 'MANJEET SINGH RATHORE', '', 'example2304070100069@demo.com'),
(69, '2304070100070', 'MEDAJIWALA MOHAMAD ZAID SIRAJBHAI', '', 'example2304070100070@demo.com'),
(70, '2304070100071', 'MEMON MOIN IQBALBHAI', '', 'example2304070100071@demo.com'),
(71, '2304070100072', 'MENON PARTH MURALIDHAR', '', 'example2304070100072@demo.com'),
(72, '2304070100073', 'MIRZA TOHIDHUSEN TAHIRHUSEN', '', 'example2304070100073@demo.com'),
(73, '2304070100074', 'MISHRA SHIVAM RAJESHKUMAR', '', 'example2304070100074@demo.com'),
(74, '2304070100075', 'MISTRY HETU MAHESHKUMAR', '', 'example2304070100075@demo.com'),
(75, '2304070100076', 'MOHAMMAD GUFRAN', '', 'example2304070100076@demo.com'),
(76, '2304070100077', 'MOVADIYA VISHALKUMAR SANJAYKUMAR', '', 'example2304070100077@demo.com'),
(77, '2304070100078', 'MUNGRA RUTU RASHIKBHAI', '', 'example2304070100078@demo.com'),
(78, '2304070100079', 'NAGAR FENIL GOVINDBHAI', '', 'example2304070100079@demo.com'),
(79, '2304070100080', 'NAGARKAR DISHANT NARESHBHAI', '', 'example2304070100080@demo.com'),
(80, '2304070100081', 'NARIGARA JAGDISH ASHOKBHAI', '', 'example2304070100081@demo.com'),
(81, '2304070100082', 'NATHBAVA HINAL SHYAMSUNDAR', '', 'example2304070100082@demo.com'),
(82, '2304070100083', 'NAYAK AMAN ALPESHBHAI', '', 'example2304070100083@demo.com'),
(83, '2304070100084', 'NINAMA SAHDEVKUMAR NAVINBHAI', '', 'example2304070100084@demo.com'),
(84, '2304070100085', 'NITIN PATEL', '', 'example2304070100085@demo.com'),
(85, '2304070100086', 'PADAMASHALI HARSH GIRISH', '', 'example2304070100086@demo.com'),
(86, '2304070100087', 'PANCHAL VAIBHAVI BHARATBHAI', '', 'example2304070100087@demo.com'),
(87, '2304070100088', 'PANDEY VIKASH SHRINIVAS', '', 'example2304070100088@demo.com'),
(88, '2304070100089', 'PARGI ALPESHBHAI KALJIBHAI', '', 'example2304070100089@demo.com'),
(89, '2304070100090', 'PARMAR HARDEEPSINH GULABSINH', '', 'example2304070100090@demo.com'),
(90, '2304070100091', 'PARMAR BHAVESH KUNDANLAL', '', 'example2304070100091@demo.com'),
(91, '2304070100092', 'PARMAR CHANDRAKANT JAYANTIBHAI', '', 'example2304070100092@demo.com'),
(92, '2304070100093', 'PARMAR HITESHKUMAR NATVARBHAI', '', 'example2304070100093@demo.com'),
(93, '2304070100094', 'PARMAR JATIN VINODBHAI', '', 'example2304070100094@demo.com'),
(94, '2304070100095', 'PARMAR JATINKUMAR NATVARBHAI', '', 'example2304070100095@demo.com'),
(95, '2304070100097', 'PARMAR PARTH KANUBHAI', '', 'example2304070100097@demo.com'),
(96, '2304070100098', 'PARMAR VAIBHAV HASMUKHBHAI', '', 'example2304070100098@demo.com'),
(97, '2304070100099', 'PATEL DEVARSHI KALPESHBHAI', '', 'example2304070100099@demo.com'),
(98, '2304070100100', 'PATEL DEVKUMAR HARESHBHAI', '', 'example2304070100100@demo.com'),
(99, '2304070100101', 'PATEL DHRUVKUMAR BHARATBHAI', '', 'example2304070100101@demo.com'),
(100, '2304070100102', 'PATEL DIVYESHKUMAR KIRITKUMAR', '', 'example2304070100102@demo.com'),
(101, '2304070100103', 'PATEL HARDIP NAGINBHAI', '', 'example2304070100103@demo.com'),
(102, '2304070100104', 'PATEL HET URESHKUMAR', '', 'example2304070100104@demo.com'),
(103, '2304070100105', 'PATEL HONEYBEN BHUPENDRABHAI', '', 'example2304070100105@demo.com'),
(104, '2304070100106', 'PATEL ISHA NARENDRABHAI', '', 'example2304070100106@demo.com'),
(105, '2304070100107', 'PATEL KALPIT VIJAYKUMAR', '', 'example2304070100107@demo.com'),
(106, '2304070100108', 'PATEL OMKUMAR JITENDRABHAI', '', 'example2304070100108@demo.com'),
(107, '2304070100109', 'PATEL PRANAV SHANKARBHAI', '', 'example2304070100109@demo.com'),
(108, '2304070100110', 'PATEL PRATHAM PANKAJBHAI', '', 'example2304070100110@demo.com'),
(109, '2304070100111', 'PATEL PRIYA KAUSHIKBHAI', '', 'example2304070100111@demo.com'),
(110, '2304070100112', 'PATEL SAUMILKUMAR MAHENDRABHAI', '', 'example2304070100112@demo.com'),
(111, '2304070100113', 'PATEL SHRUTI AMITKUMAR', '', 'example2304070100113@demo.com'),
(112, '2304070100114', 'PATEL SHUBHAM ALPESHKUMAR', '', 'example2304070100114@demo.com'),
(113, '2304070100115', 'PATEL SMIT ALPESHKUMAR', '', 'example2304070100115@demo.com'),
(114, '2304070100116', 'PATEL VANDIT MUKESHBHAI', '', 'example2304070100116@demo.com'),
(115, '2304070100117', 'PATEL VIDHI RITESHBHAI', '', 'example2304070100117@demo.com'),
(116, '2304070100118', 'PIYARJI AHESANALI MUKHTARALI', '', 'example2304070100118@demo.com'),
(117, '2304070100119', 'POOJA RANI PARIDA', '', 'example2304070100119@demo.com'),
(118, '2304070100120', 'PRAJAPATI DHIRAL DINESHBHAI', '', 'example2304070100120@demo.com'),
(119, '2304070100121', 'PRAJAPATI YOGESHKUMAR JAGDISHBHAI', '', 'example2304070100121@demo.com'),
(120, '2304070100122', 'RAJPUT HIRAL JAGDISHSINH', '', 'example2304070100122@demo.com'),
(121, '2304070100123', 'RANPARIYA PRANJALBEN RASIKBHAI', '', 'example2304070100123@demo.com'),
(122, '2304070100124', 'RATHOD BHUMIKA RAJENDRAKUMAR', '', 'example2304070100124@demo.com'),
(123, '2304070100125', 'RATHOD ISHA JAYESHBHAI', '', 'example2304070100125@demo.com'),
(124, '2304070100126', 'RATHOD MAHESHKUMAR CHANDRAKANT', '', 'example2304070100126@demo.com'),
(125, '2304070100127', 'RISHI KULDEEP JAIN', '', 'example2304070100127@demo.com'),
(126, '2304070100128', 'ROJASARA BALMUKUND RAJESHKUMAR', '', 'example2304070100128@demo.com'),
(127, '2304070100129', 'ROLA HARSH PRAFULBHAI', '', 'example2304070100129@demo.com'),
(128, '2304070100130', 'RUSHIKESH MISTRI', '', 'example2304070100130@demo.com'),
(129, '2304070100131', 'SAKSHAM PATEL', '', 'example2304070100131@demo.com'),
(130, '2304070100132', 'SANDEEP DANGI', '', 'example2304070100132@demo.com'),
(131, '2304070100133', 'SARGARA MAHIPAL KAILASHBHAI', '', 'example2304070100133@demo.com'),
(132, '2304070100134', 'SARVALIYA NAYANBHAI PRAVINBHAI', '', 'example2304070100134@demo.com'),
(133, '2304070100135', 'SATHVARA MEET SANDIPKUMAR', '', 'example2304070100135@demo.com'),
(134, '2304070100136', 'SENAMA BHAVIK KAMLESHBHAI', '', 'example2304070100136@demo.com'),
(135, '2304070100137', 'SETHIA DEEP KAMLESH (RAMILABEN)', '', 'example2304070100137@demo.com'),
(136, '2304070100138', 'SHAH DHARMIL VIPULKUMAR', '', 'example2304070100138@demo.com'),
(137, '2304070100139', 'SHAH DHRUVI ALKESHKUMAR', '', 'example2304070100139@demo.com'),
(138, '2304070100140', 'SHAH DHRUVI PRAKASHBHAI', '', 'example2304070100140@demo.com'),
(139, '2304070100141', 'SHAH DHWITI ANKITBHAI', '', 'example2304070100141@demo.com'),
(140, '2304070100142', 'SHAH HARSHAL NILESHBHAI', '', 'example2304070100142@demo.com'),
(141, '2304070100143', 'SHAH JIMISHA KUNALBHAI', '', 'example2304070100143@demo.com'),
(142, '2304070100144', 'SHAH MOKSHA DEVENDRABHAI', '', 'example2304070100144@demo.com'),
(143, '2304070100145', 'SHAH RIDDHIBEN MAYANKBHAI', '', 'example2304070100145@demo.com'),
(144, '2304070100146', 'SHAH VRUSHTI KINNARKUMAR', '', 'example2304070100146@demo.com'),
(145, '2304070100147', 'SHAIKH ARBAZ YASINBHAI', '', 'example2304070100147@demo.com'),
(146, '2304070100148', 'SHIVANI HADA', '', 'example2304070100148@demo.com'),
(147, '2304070100149', 'SHRIMALI UTSAVKUMAR RAMESHBHAI', '', 'example2304070100149@demo.com'),
(148, '2304070100150', 'SHUBHAM PATIDAR', '', 'example2304070100150@demo.com'),
(149, '2304070100151', 'SOJITRA JAY SANJAYBHAI', '', 'example2304070100151@demo.com'),
(150, '2304070100152', 'SOLANKI AJAY BHARATBHAI', '', 'example2304070100152@demo.com'),
(151, '2304070100153', 'SOLANKI DHAVALKUMAR MAHENDRABHAI', '7520bc12d18f3f1feb6f82dfb438f9aa', 'example2304070100153@demo.com'),
(152, '2304070100154', 'SOLANKI JAYRAJ SHAILESHBHAI', '3115a2f433e608663f242493c917e640', 'jayrajsolanki2003@gmail.com'),
(153, '2304070100155', 'SOLANKI MANSHIBEN LAXMANBHAI', '', 'example2304070100155@demo.com'),
(154, '2304070100156', 'SOLANKI TUSHAR MAHESHBHAI', '', 'example2304070100156@demo.com'),
(155, '2304070100157', 'SOLANKI YASH RAJESHBHAI', 'cbf4312c67ff8cd96268c3ec30c7a625', 'ys6244864@gmail.com'),
(156, '2304070100158', 'SONKUSRE SHUBHAM LILADHARBHAI', '', 'example2304070100158@demo.com'),
(157, '2304070100159', 'SURYAVANSHI TEJAS GANESHBHAI', '', 'example2304070100159@demo.com'),
(158, '2304070100160', 'SUTARIYA JEMIN SURESHBHAI', '', 'example2304070100160@demo.com'),
(159, '2304070100161', 'SUTARIYA RAVI RAMESHBHAI', '', 'example2304070100161@demo.com'),
(160, '2304070100162', 'THAKKAR VANSHITA NARESHKUMAR', '', 'example2304070100162@demo.com'),
(161, '2304070100163', 'THAKOR DHRUV DINESHBHAI', 'b21a510c362754b8c2c9fe36d6db26b5', 'dhruv22042003@gmail.com'),
(162, '2304070100164', 'THAKUR PRIYANKA THAKKARSINH', '', 'example2304070100164@demo.com'),
(163, '2304070100165', 'THUMMAR VIVEK RAJUBHAI', '', 'example2304070100165@demo.com'),
(164, '2304070100166', 'TIWARI NITIN VINAYKUMAR', '', 'example2304070100166@demo.com'),
(165, '2304070100167', 'UDHANI AAKASH PRADEEPKUMAR', 'e471ee62009c8196666941cb0f25f711', 'akashudhani33@gmail.com'),
(166, '2304070100168', 'UPADHYAY SAURAVKUMAR DILIPBHAI', '', 'example2304070100168@demo.com'),
(167, '2304070100169', 'VACHHETA DHRUV AMITBHAI', '', 'example2304070100169@demo.com'),
(168, '2304070100170', 'VADDORIYA DARSHIL DILIPBHAI', '', 'example2304070100170@demo.com'),
(169, '2304070100171', 'VADGAMA PINANK NAVALKUMAR', '', 'example2304070100171@demo.com'),
(170, '2304070100172', 'VADHAVA PARI VIJAYKUMAR', '', 'example2304070100172@demo.com'),
(171, '2304070100174', 'VAISH NIKHIL JAYESHBHAI', '', 'example2304070100174@demo.com'),
(172, '2304070100175', 'VAISHNAV JATIN DHARMENDRABHAI', '', 'example2304070100175@demo.com'),
(173, '2304070100176', 'VANKAR UMANGKUMAR NATUBHAI', '', 'example2304070100176@demo.com'),
(174, '2304070100177', 'VATALIYA PARTH BATUKBHAI', '', 'example2304070100177@demo.com'),
(175, '2304070100178', 'VED BHAVESH ROOPCHAND', '', 'example2304070100178@demo.com'),
(176, '2304070100179', 'VEKARIYA RAVI RAMESHBHAI', '', 'example2304070100179@demo.com'),
(177, '2304070100180', 'VINYA VISWANATHAN', '', 'example2304070100180@demo.com'),
(178, '2304070100181', 'VYAS JAGDISH DILIPBHAI', '', 'example2304070100181@demo.com'),
(179, '2304070100182', 'YADAV SURAJ SACHCHIDANAND', '', 'example2304070100182@demo.com'),
(180, '2304070100183', 'PARMAR HETANKSHI JAYESHKUMAR', '', 'example2304070100183@demo.com'),
(181, '2304070100184', 'BRAHMBHATT SAGAR ANILBHAI', '', 'example2304070100184@demo.com'),
(182, '2304070100185', 'CHANDERA VIVEKKUMAR NARANBHAI', '', 'example2304070100185@demo.com'),
(183, '2304070100186', 'RIJVANI RAKESH BHAVINSHANKAR', '', 'example2304070100186@demo.com'),
(184, '2304070100187', 'PRAJAPATI PARTHKUMAR DILIPKUMAR', '', 'example2304070100187@demo.com'),
(185, '2304070100188', 'KONDHIYA KRUPA VIJAYBHAI', '', 'exampleT2304010700050@demo.com'),
(186, '2304070100189', 'VAGHELA DIVYARAJSINH PRADYUMANSINH', '', 'exampleT2304010700197@demo.com'),
(187, '2304070100190', 'MAKWANA TUSHAR DHANJIBHAI', '', 'gadhviumesh41@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `generated_password`
--

CREATE TABLE `generated_password` (
  `sr_no` int(3) NOT NULL,
  `enrollment` bigint(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generated_password`
--

INSERT INTO `generated_password` (`sr_no`, `enrollment`, `email`, `password`) VALUES
(7, 2304070100042, 'nilamjamariya60@gmail.com', '249442fc472bf54a4e7f4aa59a413f46'),
(1, 2304070100058, 'ys6244864@gmail.com', '60cfe3b14a401feed90aead5dee115a5'),
(2, 2304070100153, 'example2304070100153@demo.com', '7520bc12d18f3f1feb6f82dfb438f9aa'),
(5, 2304070100157, 'ys6244864@gmail.com', '2ae750bbe03b4765720605f24228b947'),
(10, 2304070100167, 'akashudhani33@gmail.com', 'e471ee62009c8196666941cb0f25f711');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `sr_no` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `answer` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `time` int(2) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`sr_no`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `semester`, `subject`, `subject_code`, `time`, `date`) VALUES
(15, 'What is Jango?', 'abc', 'Gopi', 'Yashu', 'Yashus sabkuch', 'option4', 1, 'python', '23MCA102', 5, '2024-03-02'),
(16, 'What is Qmaster?', 'kko', 'Baby', 'Chuch', 'k', 'option3', 1, 'python', '23MCA102', 5, '2024-03-02'),
(17, 'What is Java?', 'Language', 'Bahsa', 'Nothing', 'None', 'option3', 1, 'java', '23MCA101', 5, '2024-03-03'),
(18, 'What is JS?', 'javascipr', 'abc', 'hjui', 'llj', 'option3', 1, 'java', '23MCA101', 5, '2024-03-03');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `sr_no` int(2) NOT NULL,
  `enrollment` varchar(15) NOT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `semester` int(2) DEFAULT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject` varchar(10) DEFAULT NULL,
  `total_question` int(2) DEFAULT NULL,
  `correct` int(2) DEFAULT NULL,
  `wrong` int(2) DEFAULT NULL,
  `percentage` int(3) DEFAULT NULL,
  `result_status` varchar(10) NOT NULL,
  `date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`sr_no`, `enrollment`, `student_name`, `semester`, `subject_code`, `subject`, `total_question`, `correct`, `wrong`, `percentage`, `result_status`, `date`) VALUES
(35, '2304070100157', 'SOLANKI YASH RAJESHBHAI', 1, '23MCA101', 'java', 2, 0, 2, 0, 'fail', '2024-03-03'),
(34, '2304070100157', 'SOLANKI YASH RAJESHBHAI', 1, '23MCA102', 'python', 2, 0, 2, 0, 'fail', '2024-03-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`enrollment`,`subject_code`),
  ADD UNIQUE KEY `sr_no` (`sr_no`),
  ADD KEY `enrollment_number` (`enrollment_number`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment`),
  ADD UNIQUE KEY `sr_no` (`sr_no`);

--
-- Indexes for table `generated_password`
--
ALTER TABLE `generated_password`
  ADD PRIMARY KEY (`enrollment`),
  ADD UNIQUE KEY `sr_no` (`sr_no`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `sr_no` (`sr_no`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`enrollment`,`subject_code`),
  ADD UNIQUE KEY `sr_no` (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `sr_no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `sr_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `generated_password`
--
ALTER TABLE `generated_password`
  MODIFY `sr_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `sr_no` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificate`
--
ALTER TABLE `certificate`
  ADD CONSTRAINT `certificate_ibfk_1` FOREIGN KEY (`enrollment_number`) REFERENCES `enrollment` (`enrollment`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
