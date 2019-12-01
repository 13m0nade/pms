-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-11-06 19:04:37
-- 服务器版本： 8.0.12
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `pms`
--

-- --------------------------------------------------------

--
-- 表的结构 `administrator`
--

CREATE TABLE `administrator` (
  `AID` varchar(12) NOT NULL,
  `AName` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `Phone_number` varchar(11) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `remark` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `administrator`
--

INSERT INTO `administrator` (`AID`, `AName`, `Age`, `Sex`, `Phone_number`, `Address`, `remark`) VALUES
('191031', '王生安', 35, 1, '15864952586', '江宁', 'null'),
('191101', '邱栾树', 42, 1, '15864952587', '江宁', 'null'),
('191102', '吴来衷', 30, 1, '15864952588', '溧水', 'null');

--
-- 触发器 `administrator`
--
DELIMITER $$
CREATE TRIGGER `update_AName` AFTER UPDATE ON `administrator` FOR EACH ROW update admin_login set AName = new.AName where AID=old.AID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_AName1` AFTER UPDATE ON `administrator` FOR EACH ROW update manage set AName = new.AName where AID=old.AID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `admin_login`
--

CREATE TABLE `admin_login` (
  `AID` varchar(12) NOT NULL,
  `AName` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_login`
--

INSERT INTO `admin_login` (`AID`, `AName`, `pwd`) VALUES
('191031', '王生安', 'admin123'),
('191101', '邱栾树', 'admin456'),
('191102', '吴来衷', 'admin789');

-- --------------------------------------------------------

--
-- 表的结构 `announcement`
--

CREATE TABLE `announcement` (
  `announcement_ID` varchar(15) NOT NULL,
  `Title` text NOT NULL,
  `Date` date NOT NULL,
  `Content` text NOT NULL,
  `AID` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `announcement`
--

INSERT INTO `announcement` (`announcement_ID`, `Title`, `Date`, `Content`, `AID`, `state`) VALUES
('1901', '通知', '2019-10-31', '交物业费', '191101', 1),
('1902', '通知', '2019-11-01', '座谈会通知', '191101', 1),
('1903', '通知', '2019-11-07', '交物业费', '191101', 1);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `cost_list`
-- （参见下面的实际视图）
--
CREATE TABLE `cost_list` (
`Ecost` double
,`Gcost` double
,`Mcost` double
,`pay_ID` varchar(12)
,`PID` varchar(12)
,`Qcost` double
,`Wcost` double
,`Ycost` double
);

-- --------------------------------------------------------

--
-- 表的结构 `house`
--

CREATE TABLE `house` (
  `roomNO` varchar(5) NOT NULL,
  `buildingNO` varchar(5) NOT NULL,
  `PID` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Unit` varchar(5) NOT NULL,
  `Sale_state` tinyint(1) NOT NULL,
  `floor` int(11) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `remark` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `area` varchar(20) NOT NULL,
  `direction` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `house`
--

INSERT INTO `house` (`roomNO`, `buildingNO`, `PID`, `Unit`, `Sale_state`, `floor`, `Type`, `remark`, `area`, `direction`) VALUES
('1A101', '1', '01001', 'A', 1, 1, '精装修', 'null', '江宁', '南'),
('1A102', '1', '01002', 'A', 1, 1, '精装修', 'null', '江宁', '南'),
('1A103', '1', '01003', 'A', 1, 1, '精装修', 'null', '江宁', '南'),
('1A201', '1', '01004', 'A', 1, 2, '精装修', 'null', '江宁', '南'),
('1A202', '1', '01005', 'A', 1, 2, '精装修', 'null', '江宁', '南'),
('1A203', '1', '01006', 'A', 1, 2, '精装修', 'null', '江宁', '南'),
('1A301', '1', '01007', 'A', 1, 3, '精装修', 'null', '江宁', '南'),
('1A302', '1', '01008', 'A', 1, 3, '精装修', 'null', '江宁', '南'),
('1A303', '1', '01009', 'A', 1, 3, '精装修', 'null', '江宁', '南'),
('1A401', '1', '01010', 'A', 1, 4, '精装修', 'null', '江宁', '南'),
('1A402', '1', '01011', 'A', 1, 4, '精装修', 'null', '江宁', '南'),
('1A403', '1', '01012', 'A', 1, 4, '精装修', 'null', '江宁', '南'),
('1A501', '1', '01013', 'A', 1, 5, '精装修', 'null', '江宁', '南'),
('1A502', '1', '01014', 'A', 1, 5, '精装修', 'null', '江宁', '南'),
('1A503', '1', '01015', 'A', 1, 5, '精装修', 'null', '江宁', '南'),
('1B101', '1', '01016', 'B', 1, 1, '精装修', 'null', '江宁', '南'),
('1B102', '1', '01017', 'B', 1, 1, '精装修', 'null', '江宁', '南'),
('1B103', '1', '01018', 'B', 1, 1, '精装修', 'null', '江宁', '南'),
('1B201', '1', '01019', 'B', 1, 2, '精装修', 'null', '江宁', '南'),
('1B202', '1', '01020', 'B', 1, 2, '精装修', 'null', '江宁', '南'),
('1B203', '1', '01021', 'B', 1, 2, '精装修', 'null', '江宁', '南'),
('1B301', '1', '01022', 'B', 1, 3, '精装修', 'null', '江宁', '南'),
('1B302', '1', '01023', 'B', 1, 3, '精装修', 'null', '江宁', '南'),
('1B303', '1', '01024', 'B', 1, 3, '精装修', 'null', '江宁', '南'),
('1B401', '1', '01025', 'B', 1, 4, '精装修', 'null', '江宁', '南'),
('1B402', '1', '01026', 'B', 1, 4, '精装修', 'null', '江宁', '南'),
('1B403', '1', '01027', 'B', 1, 4, '精装修', 'null', '江宁', '南'),
('1B501', '1', '01028', 'B', 1, 5, '精装修', 'null', '江宁', '南'),
('1B502', '1', '01029', 'B', 1, 5, '精装修', 'null', '江宁', '南'),
('1B503', '1', '01030', 'B', 1, 5, '精装修', 'null', '江宁', '南'),
('2A101', '2', '01031', 'A', 1, 1, '精装修', 'null', '江宁', '南'),
('2A102', '2', '01032', 'A', 1, 1, '精装修', 'null', '江宁', '南'),
('2A103', '2', '01033', 'A', 1, 1, '精装修', 'null', '江宁', '南'),
('2A201', '2', '01034', 'A', 1, 2, '精装修', 'null', '江宁', '南'),
('2A202', '2', '01035', 'A', 1, 2, '精装修', 'null', '江宁', '南'),
('2A203', '2', '01036', 'A', 1, 2, '精装修', 'null', '江宁', '南'),
('2A301', '2', '01037', 'A', 1, 3, '精装修', 'null', '江宁', '南'),
('2A302', '2', '01038', 'A', 1, 3, '精装修', 'null', '江宁', '南'),
('2A303', '2', '01039', 'A', 1, 3, '精装修', 'null', '江宁', '南'),
('2A401', '2', '01040', 'A', 1, 4, '精装修', 'null', '江宁', '南'),
('2A402', '2', '01041', 'A', 1, 4, '精装修', 'null', '江宁', '南'),
('2A403', '2', '01042', 'A', 1, 4, '精装修', 'null', '江宁', '南'),
('2A501', '2', '01043', 'A', 1, 5, '精装修', 'null', '江宁', '南'),
('2A502', '2', '01044', 'A', 1, 5, '精装修', 'null', '江宁', '南'),
('2A503', '2', '01045', 'A', 1, 5, '精装修', 'null', '江宁', '南'),
('2B101', '2', '01046', 'B', 1, 1, '精装修', 'null', '江宁', '南'),
('2B102', '2', '01047', 'B', 1, 1, '精装修', 'null', '江宁', '南'),
('2B103', '2', '01048', 'B', 1, 1, '精装修', 'null', '江宁', '南'),
('2B201', '2', '01049', 'B', 1, 2, '精装修', 'null', '江宁', '南'),
('2B202', '2', '01050', 'B', 1, 2, '精装修', 'null', '江宁', '南'),
('2B203', '2', '01051', 'B', 1, 2, '精装修', 'null', '江宁', '南'),
('2B301', '2', '01052', 'B', 1, 3, '精装修', 'null', '江宁', '南'),
('2B302', '2', 'null', 'B', 0, 3, '精装修', '待售', '江宁', '南'),
('2B303', '2', 'null', 'B', 0, 3, '精装修', '待售', '江宁', '南'),
('2B401', '2', 'null', 'B', 0, 4, '精装修', '待售', '江宁', '南'),
('2B402', '2', 'null', 'B', 0, 4, '精装修', '待售', '江宁', '南'),
('2B403', '2', 'null', 'B', 0, 4, '精装修', '待售', '江宁', '南'),
('2B501', '2', 'null', 'B', 0, 5, '精装修', '待售', '江宁', '南'),
('2B502', '2', 'null', 'B', 0, 5, '精装修', '待售', '江宁', '南'),
('2B503', '2', 'null', 'B', 0, 5, '精装修', '待售', '江宁', '南');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `information`
-- （参见下面的实际视图）
--
CREATE TABLE `information` (
`buildingNO` varchar(5)
,`PhoneNumber` varchar(11)
,`PID` varchar(12)
,`PName` varchar(20)
,`roomNO` varchar(5)
,`Unit` varchar(5)
);

-- --------------------------------------------------------

--
-- 表的结构 `manage`
--

CREATE TABLE `manage` (
  `AID` varchar(12) NOT NULL,
  `PID` varchar(12) NOT NULL,
  `AName` varchar(20) NOT NULL,
  `PName` varchar(20) NOT NULL,
  `money` double NOT NULL,
  `money_state` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `manage`
--

INSERT INTO `manage` (`AID`, `PID`, `AName`, `PName`, `money`, `money_state`) VALUES
('191102', '01001', '吴来衷', '林充蝶', 500, 1),
('191102', '01002', '吴来衷', '曾以惠', 500, 1),
('191102', '01003', '吴来衷', '江服靖', 0, 0),
('191102', '01004', '吴来衷', '蔡丞瑜', 500, 1),
('191102', '01005', '吴来衷', '张嫡贤', 500, 1),
('191102', '01006', '吴来衷', '席侠喜', 500, 1),
('191102', '01007', '吴来衷', '洪伟若', 500, 1),
('191102', '01008', '吴来衷', '关骞朔', 500, 1),
('191102', '01009', '吴来衷', '傅生锡', 500, 1),
('191102', '01010', '吴来衷', '欧恒皓', 0, 0),
('191102', '01011', '吴来衷', '薛雪棉', 500, 1),
('191102', '01012', '吴来衷', '吕夏艾', 500, 1),
('191102', '01013', '吴来衷', '涂朋本', 500, 1),
('191102', '01014', '吴来衷', '张漂凉', 500, 1),
('191102', '01015', '吴来衷', '曹曦颜', 500, 1),
('191102', '01016', '吴来衷', '姜柏弥', 500, 1),
('191102', '01017', '吴来衷', '蔡卫俊', 500, 1),
('191102', '01018', '吴来衷', '戚仲佳', 500, 1),
('191102', '01019', '吴来衷', '何夏', 500, 1),
('191102', '01020', '吴来衷', '宁茹静', 500, 1),
('191102', '01021', '吴来衷', '李希侨', 500, 1),
('191102', '01022', '吴来衷', '孙恋烈', 500, 1),
('191102', '01023', '吴来衷', '黄妙彤', 500, 1),
('191102', '01024', '吴来衷', '林晓', 500, 1),
('191102', '01025', '吴来衷', '林凡湘', 500, 1),
('191102', '01026', '吴来衷', '易联良', 500, 1),
('191102', '01027', '吴来衷', '严宇轩', 500, 1),
('191102', '01028', '吴来衷', '张粟雪', 500, 1),
('191102', '01029', '吴来衷', '周鼎榕', 500, 1),
('191102', '01030', '吴来衷', '齐木铭', 500, 1),
('191031', '01031', '王生安', '陈绍翀', 500, 1),
('191031', '01032', '王生安', '王孟声', 500, 1),
('191031', '01033', '王生安', '黄蔓滕', 0, 0),
('191031', '01034', '王生安', '危郎史', 500, 1),
('191031', '01035', '王生安', '陶桥代', 500, 1),
('191031', '01036', '王生安', '周奇宁', 500, 1),
('191031', '01037', '王生安', '孟翱壮', 500, 1),
('191031', '01038', '王生安', '雷爽甜', 500, 1),
('191031', '01039', '王生安', '姬喜赋', 500, 1),
('191031', '01040', '王生安', '王锦里', 500, 1),
('191031', '01041', '王生安', '吴宇招', 500, 1),
('191031', '01042', '王生安', '郑讯汐', 500, 1),
('191031', '01043', '王生安', '邬赣伊', 500, 1),
('191031', '01044', '王生安', '路楠永', 500, 1),
('191031', '01045', '王生安', '元幸程', 500, 1),
('191031', '01046', '王生安', '庄晋荷', 500, 1),
('191031', '01047', '王生安', '蔡农思', 500, 1),
('191031', '01048', '王生安', '邹毅资', 500, 1),
('191031', '01049', '王生安', '李持睿', 500, 1),
('191031', '01050', '王生安', '穆好冉', 500, 1),
('191031', '01051', '王生安', '叶昂泽', 500, 1),
('191031', '01052', '王生安', '陈婷', 500, 1);

-- --------------------------------------------------------

--
-- 表的结构 `pay`
--

CREATE TABLE `pay` (
  `pay_ID` varchar(12) NOT NULL,
  `pay_state` tinyint(1) NOT NULL,
  `PID` varchar(12) NOT NULL,
  `Pname` varchar(20) NOT NULL,
  `Wdegree` int(11) NOT NULL,
  `Edegree` int(11) NOT NULL,
  `Gdegree` int(11) NOT NULL,
  `Wcost` double NOT NULL,
  `Ecost` double NOT NULL,
  `Gcost` double NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pay`
--

INSERT INTO `pay` (`pay_ID`, `pay_state`, `PID`, `Pname`, `Wdegree`, `Edegree`, `Gdegree`, `Wcost`, `Ecost`, `Gcost`, `state`) VALUES
('P050', 1, '01050', '穆好冉', 53, 130, 130, 106, 130, 130, 1),
('P049', 1, '01049', '李持睿', 52, 130, 130, 104, 130, 130, 1),
('P048', 1, '01048', '邹毅资', 53, 130, 130, 106, 130, 130, 1),
('P047', 1, '01047', '蔡农思', 52, 130, 130, 104, 130, 130, 1),
('P046', 1, '01046', '庄晋荷', 51, 130, 130, 102, 130, 130, 1),
('P045', 1, '01045', '元幸程', 50, 130, 130, 100, 130, 130, 1),
('P044', 1, '01044', '路楠永', 53, 130, 130, 106, 130, 130, 1),
('P043', 1, '01043', '邬赣伊', 52, 130, 130, 104, 130, 130, 1),
('P042', 1, '01042', '郑讯汐', 51, 130, 130, 102, 130, 130, 1),
('P041', 1, '01041', '吴宇招', 50, 130, 130, 100, 130, 130, 1),
('P040', 1, '01040', '王锦里', 53, 130, 130, 106, 130, 130, 1),
('P039', 1, '01039', '姬喜赋', 52, 130, 130, 104, 130, 130, 1),
('P038', 1, '01038', '雷爽甜', 51, 130, 130, 102, 130, 130, 1),
('P037', 1, '01037', '孟翱壮', 50, 130, 130, 100, 130, 130, 1),
('P036', 1, '01036', '周奇宁', 53, 130, 130, 106, 130, 130, 1),
('P035', 1, '01035', '陶桥代', 52, 130, 130, 104, 130, 130, 1),
('P034', 1, '01034', '危郎史', 51, 130, 130, 102, 130, 130, 1),
('P033', 1, '01033', '黄蔓滕', 50, 130, 130, 100, 130, 130, 1),
('P032', 1, '01032', '王孟声', 53, 130, 130, 106, 130, 130, 1),
('P031', 1, '01031', '陈绍翀', 52, 130, 130, 104, 130, 130, 1),
('P030', 1, '01030', '齐木铭', 51, 130, 130, 102, 130, 130, 1),
('P029', 1, '01029', '周鼎榕', 50, 130, 130, 100, 130, 130, 1),
('P028', 1, '01028', '张粟雪', 53, 130, 130, 106, 130, 130, 1),
('P027', 1, '01027', '严宇轩', 52, 130, 130, 104, 130, 130, 1),
('P026', 1, '01026', '易联良', 51, 130, 130, 102, 130, 130, 1),
('P025', 1, '01025', '林凡湘', 50, 130, 130, 100, 130, 130, 1),
('P024', 1, '01024', '林晓', 53, 130, 130, 106, 130, 130, 1),
('P023', 1, '01023', '黄妙彤', 52, 120, 120, 104, 120, 120, 1),
('P022', 1, '01022', '孙恋烈', 51, 120, 120, 102, 120, 120, 1),
('P021', 1, '01021', '李希侨', 50, 120, 120, 100, 120, 120, 1),
('P020', 0, '01020', '宁茹静', 53, 120, 120, 106, 120, 120, 1),
('P019', 1, '01019', '何夏', 52, 120, 120, 104, 120, 120, 1),
('P018', 1, '01018', '戚仲佳', 51, 120, 120, 102, 120, 120, 1),
('P017', 1, '01017', '蔡卫俊', 50, 120, 120, 100, 120, 120, 1),
('P016', 1, '01016', '姜柏弥', 53, 120, 120, 106, 120, 120, 1),
('P015', 1, '01015', '曹曦颜', 52, 120, 120, 104, 120, 120, 1),
('P014', 1, '01014', '张漂凉', 51, 111, 111, 102, 111, 111, 1),
('P013', 1, '01013', '涂朋本', 50, 101, 101, 100, 101, 101, 1),
('P012', 1, '01012', '吕夏艾', 53, 110, 110, 106, 110, 110, 1),
('P011', 1, '01011', '薛雪棉', 52, 109, 109, 104, 109, 109, 1),
('P010', 1, '01010', '欧恒皓', 51, 108, 108, 102, 108, 108, 1),
('P009', 1, '01009', '傅生锡', 50, 108, 108, 100, 108, 108, 1),
('P008', 1, '01008', '关骞朔', 53, 108, 108, 106, 108, 108, 1),
('P007', 1, '01007', '洪伟若', 52, 108, 108, 104, 108, 108, 1),
('P006', 1, '01006', '席侠喜', 51, 108, 108, 102, 108, 108, 1),
('P005', 1, '01005', '张嫡贤', 50, 107, 107, 100, 107, 107, 1),
('P004', 1, '01004', '蔡丞瑜', 53, 106, 106, 106, 106, 106, 1),
('P003', 1, '01003', '江服靖', 52, 104, 104, 104, 104, 104, 1),
('P002', 1, '01002', '曾以惠', 51, 102, 102, 102, 102, 102, 1),
('P001', 1, '01001', '林充蝶', 50, 100, 100, 100, 100, 100, 1),
('P051', 1, '01051', '叶昂泽', 50, 130, 130, 100, 130, 130, 1),
('P052', 1, '01052', '陈婷', 51, 130, 130, 102, 130, 130, 1);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `pay_state`
-- （参见下面的实际视图）
--
CREATE TABLE `pay_state` (
`money_state` tinyint(1)
,`pay_state` tinyint(1)
,`PID` varchar(12)
,`Pname` varchar(20)
);

-- --------------------------------------------------------

--
-- 表的结构 `print_list`
--

CREATE TABLE `print_list` (
  `PrintID` varchar(12) NOT NULL,
  `PName` varchar(20) NOT NULL,
  `PID` varchar(12) NOT NULL,
  `Mcost` double NOT NULL,
  `Qcost` double NOT NULL,
  `Ycost` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `print_list`
--

INSERT INTO `print_list` (`PrintID`, `PName`, `PID`, `Mcost`, `Qcost`, `Ycost`) VALUES
('Print001', '林充蝶', '01001', 300, 900, 3600),
('Print002', '曾以惠', '01002', 300, 900, 3600),
('Print003', '江服靖', '01003', 300, 900, 3600),
('Print004', '蔡丞瑜', '01004', 300, 900, 3600),
('Print005', '张嫡贤', '01005', 300, 900, 3600),
('Print006', '席侠喜', '01006', 300, 900, 3600),
('Print007', '洪伟若', '01007', 300, 900, 3600),
('Print008', '关骞朔', '01008', 300, 900, 3600),
('Print009', '傅生锡', '01009', 300, 900, 3600),
('Print010', '欧恒皓', '01010', 300, 900, 3600),
('Print011', '薛雪棉', '01011', 300, 900, 3600),
('Print012', '吕夏艾', '01012', 300, 900, 3600),
('Print013', '涂朋本', '01013', 300, 900, 3600),
('Print014', '张漂凉', '01014', 300, 900, 3600),
('Print015', '曹曦颜', '01015', 300, 900, 3600),
('Print016', '姜柏弥', '01016', 300, 900, 3600),
('Print017', '蔡卫俊', '01017', 300, 900, 3600),
('Print018', '戚仲佳', '01018', 300, 900, 3600),
('Print019', '何夏', '01019', 300, 900, 3600),
('Print020', '宁茹静', '01020', 300, 900, 3600),
('Print021', '李希侨', '01021', 300, 900, 3600),
('Print022', '孙恋烈', '01022', 300, 900, 3600),
('Print023', '黄妙彤', '01023', 300, 900, 3600),
('Print024', '林晓', '01024', 300, 900, 3600),
('Print025', '林凡湘', '01025', 300, 900, 3600),
('Print026', '易联良', '01026', 300, 900, 3600),
('Print027', '严宇轩', '01027', 300, 900, 3600),
('Print028', '张粟雪', '01028', 300, 900, 3600),
('Print029', '周鼎榕', '01029', 300, 900, 3600),
('Print030', '齐木铭', '01030', 300, 900, 3600),
('Print031', '陈绍翀', '01031', 300, 900, 3600),
('Print032', '王孟声', '01032', 300, 900, 3600),
('Print033', '黄蔓滕', '01033', 300, 900, 3600),
('Print034', '危郎史', '01034', 300, 900, 3600),
('Print035', '陶桥代', '01035', 300, 900, 3600),
('Print036', '周奇宁', '01036', 300, 900, 3600),
('Print037', '孟翱壮', '01037', 300, 900, 3600),
('Print038', '雷爽甜', '01038', 300, 900, 3600),
('Print039', '姬喜赋', '01039', 300, 900, 3600),
('Print040', '王锦里', '01040', 300, 900, 3600),
('Print041', '吴宇招', '01041', 300, 900, 3600),
('Print042', '郑讯汐', '01042', 300, 900, 3600),
('Print043', '邬赣伊', '01043', 300, 900, 3600),
('Print044', '路楠永', '01044', 300, 900, 3600),
('Print045', '元幸程', '01045', 300, 900, 3600),
('Print046', '庄晋荷', '01046', 300, 900, 3600),
('Print047', '蔡农思', '01047', 300, 900, 3600),
('Print048', '邹毅资', '01048', 300, 900, 3600),
('Print049', '李持睿', '01049', 300, 900, 3600),
('Print050', '穆好冉', '01050', 300, 900, 3600),
('Print051', '叶昂泽', '01051', 300, 900, 3600),
('Print052', '陈婷', '01052', 300, 900, 3600);

-- --------------------------------------------------------

--
-- 表的结构 `proprietor`
--

CREATE TABLE `proprietor` (
  `PID` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `roomNO` varchar(5) NOT NULL,
  `carNO` varchar(10) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `state` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `proprietor`
--

INSERT INTO `proprietor` (`PID`, `PName`, `roomNO`, `carNO`, `PhoneNumber`, `state`) VALUES
('01001', '林充蝶', '1A101', '苏A11111', '12345678911', 1),
('01002', '曾以惠', '1A102', '苏A11112', '12345678911', 1),
('01003', '江服靖', '1A103', '苏A11113', '12345678911', 1),
('01004', '蔡丞瑜', '1A201', '苏A11114', '12345678911', 1),
('01005', '张嫡贤', '1A202', '苏A11115', '12345678911', 1),
('01006', '席侠喜', '1A203', '苏A11116', '12345678911', 1),
('01007', '洪伟若', '1A301', '苏A11117', '12345678911', 1),
('01008', '关骞朔', '1A302', '苏A11118', '12345678911', 1),
('01009', '傅生锡', '1A303', '苏A11119', '12345678911', 1),
('01010', '欧恒皓', '1A401', '苏A11120', '12345678911', 1),
('01011', '薛雪棉', '1A402', '苏A11121', '12345678911', 1),
('01012', '吕夏艾', '1A403', '苏A11122', '12345678911', 1),
('01013', '涂朋本', '1A501', '苏A11123', '12345678911', 1),
('01014', '张漂凉', '1A502', '苏A11124', '12345678911', 1),
('01015', '曹曦颜', '1A503', '苏A11125', '12345678914', 1),
('01016', '姜柏弥', '1B101', '苏A11126', '12345678911', 1),
('01017', '蔡卫俊', '1B102', '苏A11127', '12345678911', 1),
('01018', '戚仲佳', '1B103', '苏A11128', '12345678911', 1),
('01019', '何夏', '1B201', '苏A11129', '12345678911', 1),
('01020', '宁茹静', '1B202', '苏A11130', '12345678911', 1),
('01021', '李希侨', '1B203', '苏A11131', '12345678911', 1),
('01022', '孙恋烈', '1B301', '苏A11132', '12345678911', 1),
('01023', '黄妙彤', '1B302', '苏A11133', '12345678911', 1),
('01024', '林晓', '1B303', '苏A11134', '12345678911', 1),
('01025', '林凡湘', '1B401', '苏A11135', '12345678911', 1),
('01026', '易联良', '1B402', '苏A11136', '12345678911', 1),
('01027', '严宇轩', '1B403', '苏A11137', '12345678911', 1),
('01028', '张粟雪', '1B501', '苏A11138', '12345678911', 1),
('01029', '周鼎榕', '1B502', '苏A11139', '12345678911', 1),
('01030', '齐木铭', '1B503', '苏A11140', '12345678911', 1),
('01031', '陈绍翀', '2A101', '苏A11141', '12345678911', 1),
('01032', '王孟声', '2A102', '苏A11142', '12345678911', 1),
('01033', '黄蔓滕', '2A103', '苏A11143', '12345678911', 1),
('01034', '危郎史', '2A201', '苏A11144', '12345678911', 1),
('01035', '陶桥代', '2A202', '苏A11145', '12345678911', 1),
('01036', '周奇宁', '2A203', '苏A11146', '12345678911', 1),
('01037', '孟翱壮', '2A301', '苏A11147', '12345678911', 1),
('01038', '雷爽甜', '2A302', '苏A11148', '12345678911', 1),
('01039', '姬喜赋', '2A303', '苏A11149', '12345678911', 1),
('01040', '王锦里', '2A401', '苏A11150', '12345678911', 1),
('01041', '吴宇招', '2A402', '苏A11151', '12345678911', 1),
('01042', '郑讯汐', '2A403', '苏A11152', '12345678911', 1),
('01043', '邬赣伊', '2A501', '苏A11153', '12345678911', 1),
('01044', '路楠永', '2A502', '苏A11154', '12345678911', 1),
('01045', '元幸程', '2A503', '苏A11155', '12345678911', 1),
('01046', '庄晋荷', '2B101', '苏A11156', '12345678911', 1),
('01047', '蔡农思', '2B102', '苏A11157', '12345678911', 1),
('01048', '邹毅资', '2B103', '苏A11158', '12345678911', 1),
('01049', '李持睿', '2B201', '苏A11159', '12345678911', 1),
('01050', '穆好冉', '2B202', '苏A11160', '12345678911', 1),
('01051', '叶昂泽', '2B203', '苏A11161', '12345678911', 1),
('01052', '陈婷', '2B301', '苏A11162', '12345678911', 1);

--
-- 触发器 `proprietor`
--
DELIMITER $$
CREATE TRIGGER `del_house` AFTER DELETE ON `proprietor` FOR EACH ROW delete from house where roomNO=old.roomNO
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_manage` AFTER DELETE ON `proprietor` FOR EACH ROW delete from manage where PID=old.PID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del_user` AFTER DELETE ON `proprietor` FOR EACH ROW delete from user_login where PID=old.PID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_userlogin` AFTER INSERT ON `proprietor` FOR EACH ROW insert into user_login values (new.PID,new.PName,'123456')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_PName` AFTER UPDATE ON `proprietor` FOR EACH ROW update user_login set PName = new.PName where PID=old.PID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_PName1` AFTER UPDATE ON `proprietor` FOR EACH ROW update pay set PName = new.PName where PID=old.PID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_PName2` AFTER UPDATE ON `proprietor` FOR EACH ROW update repair set PName = new.PName where PID=old.PID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_PName3` AFTER UPDATE ON `proprietor` FOR EACH ROW update print_list set PName = new.PName where PID=old.PID
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_PName4` AFTER UPDATE ON `proprietor` FOR EACH ROW update manage set PName = new.PName where PID=old.PID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `repair`
--

CREATE TABLE `repair` (
  `RID` varchar(12) NOT NULL,
  `Date` date NOT NULL,
  `PID` varchar(12) NOT NULL,
  `PName` varchar(20) NOT NULL,
  `roomNO` varchar(5) NOT NULL,
  `State` tinyint(1) NOT NULL,
  `Details` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `repair`
--

INSERT INTO `repair` (`RID`, `Date`, `PID`, `PName`, `roomNO`, `State`, `Details`) VALUES
('1901', '2019-11-01', '01030', '齐木铭', '1B503', 0, 'null'),
('1902', '2019-11-03', '01015', '曹曦颜', '1A503', 1, 'null'),
('1903', '2019-11-03', '01025', '林凡湘', '1B401', 1, 'null'),
('1904', '2019-11-03', '01025', '林凡湘', '1B401', 1, 'null'),
('1905', '2019-11-06', '01001', '林充蝶', '1A101', 1, 'null');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `repair_information`
-- （参见下面的实际视图）
--
CREATE TABLE `repair_information` (
`buildingNO` varchar(5)
,`Details` varchar(100)
,`floor` int(11)
,`PName` varchar(20)
,`roomNO` varchar(5)
,`State` tinyint(1)
,`Unit` varchar(5)
);

-- --------------------------------------------------------

--
-- 表的结构 `user_login`
--

CREATE TABLE `user_login` (
  `PID` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `PName` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user_login`
--

INSERT INTO `user_login` (`PID`, `PName`, `pwd`) VALUES
('01053', '曹曦颜123', '123456'),
('01001', '林充蝶', 'LCD01001'),
('01002', '曾以惠', 'ZYH01002'),
('01003', '江服靖', 'JFJ01003'),
('01004', '蔡丞瑜', 'CCY01004'),
('01005', '张嫡贤', 'ZDX01005'),
('01006', '席侠喜', 'XXX01006'),
('01007', '洪伟若', 'HWR01007'),
('01008', '关骞朔', 'GSQ01008'),
('01009', '傅生锡', 'FSX01009'),
('01010', '欧恒皓', 'OHH01010'),
('01011', '薛雪棉', 'XXM01011'),
('01012', '吕夏艾', '123456'),
('01013', '涂朋本', '123456'),
('01014', '张漂凉', '123456'),
('01015', '曹曦颜', '12345'),
('01016', '姜柏弥', '123456'),
('01017', '蔡卫俊', '123456'),
('01018', '戚仲佳', '123456'),
('01019', '何夏', '123456'),
('01020', '宁茹静', '123456'),
('01021', '李希侨', '123456'),
('01022', '孙恋烈', '123456'),
('01023', '黄妙彤', '123456'),
('01024', '林晓', '123456'),
('01025', '林凡湘', '123456'),
('01026', '易联良', '123456'),
('01027', '严宇轩', '123456'),
('01028', '张粟雪', '123456'),
('01029', '周鼎榕', '123456'),
('01030', '齐木铭', '123456'),
('01031', '陈绍翀', '123456'),
('01032', '王孟声', '123456'),
('01033', '黄蔓滕', '123456'),
('01034', '危郎史', '123456'),
('01035', '陶桥代', '123456'),
('01036', '周奇宁', '123456'),
('01037', '孟翱壮', '123456'),
('01038', '雷爽甜', '123456'),
('01039', '姬喜赋', '123456'),
('01040', '王锦里', '123456'),
('01041', '吴宇招', '123456'),
('01042', '郑讯汐', '123456'),
('01043', '邬赣伊', '123456'),
('01044', '路楠永', '123456'),
('01045', '元幸程', '123456'),
('01046', '庄晋荷', '123456'),
('01047', '蔡农思', '123456'),
('01048', '邹毅资', '123456'),
('01049', '李持睿', '123456'),
('01050', '穆好冉', '123456'),
('01051', '叶昂泽', '123456'),
('01052', '陈婷', 'CT01052');

-- --------------------------------------------------------

--
-- 视图结构 `cost_list`
--
DROP TABLE IF EXISTS `cost_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cost_list`  AS  select `pay`.`pay_ID` AS `pay_ID`,`pay`.`PID` AS `PID`,`pay`.`Ecost` AS `Ecost`,`pay`.`Wcost` AS `Wcost`,`pay`.`Gcost` AS `Gcost`,`print_list`.`Mcost` AS `Mcost`,`print_list`.`Qcost` AS `Qcost`,`print_list`.`Ycost` AS `Ycost` from (`pay` join `print_list`) where (`pay`.`PID` = `print_list`.`PID`) ;

-- --------------------------------------------------------

--
-- 视图结构 `information`
--
DROP TABLE IF EXISTS `information`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `information`  AS  select `proprietor`.`PID` AS `PID`,`proprietor`.`PName` AS `PName`,`house`.`buildingNO` AS `buildingNO`,`house`.`Unit` AS `Unit`,`house`.`roomNO` AS `roomNO`,`proprietor`.`PhoneNumber` AS `PhoneNumber` from (`proprietor` join `house`) where (`proprietor`.`PID` = `house`.`PID`) ;

-- --------------------------------------------------------

--
-- 视图结构 `pay_state`
--
DROP TABLE IF EXISTS `pay_state`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pay_state`  AS  select `pay`.`PID` AS `PID`,`pay`.`Pname` AS `Pname`,`pay`.`pay_state` AS `pay_state`,`manage`.`money_state` AS `money_state` from (`pay` join `manage`) where (`pay`.`PID` = `manage`.`PID`) ;

-- --------------------------------------------------------

--
-- 视图结构 `repair_information`
--
DROP TABLE IF EXISTS `repair_information`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `repair_information`  AS  select `house`.`roomNO` AS `roomNO`,`house`.`buildingNO` AS `buildingNO`,`house`.`Unit` AS `Unit`,`house`.`floor` AS `floor`,`repair`.`PName` AS `PName`,`repair`.`State` AS `State`,`repair`.`Details` AS `Details` from (`repair` join `house`) where (`house`.`PID` = `repair`.`PID`) ;

--
-- 转储表的索引
--

--
-- 表的索引 `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AID`);

--
-- 表的索引 `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`AID`);

--
-- 表的索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_ID`);

--
-- 表的索引 `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`roomNO`);

--
-- 表的索引 `manage`
--
ALTER TABLE `manage`
  ADD PRIMARY KEY (`AID`,`PID`);

--
-- 表的索引 `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_ID`);

--
-- 表的索引 `print_list`
--
ALTER TABLE `print_list`
  ADD PRIMARY KEY (`PrintID`);

--
-- 表的索引 `proprietor`
--
ALTER TABLE `proprietor`
  ADD PRIMARY KEY (`PID`);

--
-- 表的索引 `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`RID`);

--
-- 表的索引 `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`PID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
