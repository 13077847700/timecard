-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-10-20 13:04:49
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timecard`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group`
--

CREATE TABLE `think_auth_group` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL DEFAULT '' COMMENT '用户组中文名称',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '' COMMENT '用户组拥有的规则id，多个规则 , 隔开'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_auth_group`
--

INSERT INTO `think_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(1, '超级管理员', 1, '0'),
(2, '管理员', 1, '1,11,10'),
(3, '会员', 1, '1,11,10,12,13,14,15,17,18');

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_group_access`
--

CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_auth_group_access`
--

INSERT INTO `think_auth_group_access` (`uid`, `group_id`) VALUES
(1, 1),
(11, 3),
(12, 1),
(15, 2),
(102, 3),
(103, 3),
(104, 3),
(105, 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_auth_rule`
--

CREATE TABLE `think_auth_rule` (
  `id` int(8) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `name` char(80) NOT NULL,
  `title` char(20) NOT NULL DEFAULT '',
  `icon` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `islink` tinyint(1) NOT NULL DEFAULT '1',
  `o` int(11) NOT NULL,
  `tips` text NOT NULL COMMENT '提示'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_auth_rule`
--

INSERT INTO `think_auth_rule` (`id`, `pid`, `name`, `title`, `icon`, `type`, `status`, `condition`, `islink`, `o`, `tips`) VALUES
(1, 0, '', '首页', 'fa fa-home', 1, 1, '', 1, 1, '这里是后台首页'),
(11, 1, 'Index/index', '首页统计', 'fa fa-circle-o', 1, 1, '', 1, 5, ''),
(10, 1, 'Message/index', '留言信息', 'fa fa-circle-o', 1, 1, '', 1, 6, ''),
(5, 0, '', '用户及组', 'fa fa-users', 1, 1, '', 1, 3, ''),
(6, 5, 'Member/index', '用户管理', 'fa fa-circle-o', 1, 1, '', 1, 1, ''),
(7, 5, 'Member/add', '新增用户', 'fa fa-circle-o', 1, 1, '', 1, 2, ''),
(8, 5, 'Group/index', '用户组管理', 'fa fa-circle-o', 1, 1, '', 1, 3, ''),
(9, 5, 'Group/add', '新增用户组', 'fa fa-circle-o', 1, 1, '', 1, 4, ''),
(13, 12, 'Setting/index', '网站配置', 'fa fa-circle-o', 1, 1, '', 1, 0, ''),
(12, 0, '', '系统设置', 'fa  fa-cog', 1, 1, '', 1, 4, ''),
(14, 12, 'Menu/index', '菜单管理', 'fa fa-circle-o', 1, 1, '', 1, 2, ''),
(15, 12, 'Menu/add', '新增菜单', 'fa fa-circle-o', 1, 1, '', 1, 3, ''),
(17, 12, 'Category/index', '分类管理', 'fa fa-circle-o', 1, 1, '', 1, 4, ''),
(18, 12, 'Database/backup', '数据库备份', 'fa fa-circle-o', 1, 1, '', 1, 5, ''),
(65, 59, 'Vacation/index', '请假申请', 'fa fa-circle-o', 1, 1, '', 1, 6, ''),
(59, 0, '', '考勤系统', 'fa fa-edit', 1, 1, '', 1, 2, ''),
(60, 59, 'Employee/add', '新增员工', 'fa fa-circle-o', 1, 1, '', 1, 1, ''),
(61, 59, 'Employee/index', '员工管理', 'fa fa-circle-o', 1, 1, '', 1, 2, ''),
(62, 59, 'Timecard/vacation', '年假查询', 'fa fa-circle-o', 1, 1, '', 1, 3, ''),
(63, 59, 'Department/index', '部门管理', 'fa fa-circle-o', 1, 1, '', 1, 4, ''),
(64, 59, 'Position/index', '职位管理', 'fa fa-circle-o', 1, 1, '', 1, 5, '');

-- --------------------------------------------------------

--
-- 表的结构 `think_department`
--

CREATE TABLE `think_department` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL COMMENT '部门名称',
  `remark` text NOT NULL COMMENT '备注',
  `deptno` int(11) NOT NULL COMMENT '部门编号'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='部门表';

--
-- 转存表中的数据 `think_department`
--

INSERT INTO `think_department` (`id`, `dept_name`, `remark`, `deptno`) VALUES
(1, 'SEM部门', '这个部门是干什么的', 0),
(2, '策划部', '这个部门在哪里', 0),
(3, '创意部', '这里是创意部', 0),
(4, '技术部', '对对对', 0),
(5, '广州团队', '这个是广州团队哟!哈哈哈', 0),
(6, '第三事业部（GZ）', '滴滴滴滴滴', 0),
(8, '广告部', 'hello world', 0),
(9, '资深策划师', '这个部门和谁有交接', 0);

-- --------------------------------------------------------

--
-- 表的结构 `think_education`
--

CREATE TABLE `think_education` (
  `id` int(11) NOT NULL,
  `degree` varchar(200) NOT NULL COMMENT '学历',
  `major` varchar(200) NOT NULL COMMENT '专业',
  `school_name` varchar(200) NOT NULL COMMENT '毕业院校',
  `time` int(11) NOT NULL COMMENT '毕业时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='学历表';

-- --------------------------------------------------------

--
-- 表的结构 `think_log`
--

CREATE TABLE `think_log` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `time` int(11) NOT NULL,
  `ip` int(16) NOT NULL,
  `log` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_log`
--

INSERT INTO `think_log` (`id`, `username`, `time`, `ip`, `log`) VALUES
(1, 'administrator', 1473352425, 0, '登陆成功'),
(2, 'administrator', 1473386817, 0, '登陆成功'),
(3, 'administrator', 1473386859, 0, '登陆成功'),
(4, 'administrator', 1473388928, 0, '登陆成功'),
(5, 'administrator', 1473389001, 0, '登陆成功'),
(6, 'administrator', 1473392456, 0, '登陆成功'),
(7, 'administrator', 1473401118, 0, '登陆成功'),
(8, 'administrator', 1473401296, 0, '登陆成功'),
(9, 'administrator', 1473401646, 0, '登陆成功'),
(10, 'administrator', 1473401826, 0, '登陆成功'),
(11, 'administrator', 1473401999, 0, '登陆成功'),
(12, 'administrator', 1473402021, 0, '登陆成功'),
(13, 'administrator', 1473402043, 0, '登陆成功'),
(14, 'administrator', 1473402206, 0, '登陆成功'),
(15, 'administrator', 1473402271, 0, '登陆成功'),
(16, 'administrator', 1473403497, 0, '登陆成功'),
(17, 'administrator', 1473404071, 0, '登陆成功'),
(18, 'administrator', 1473404248, 0, '登陆成功'),
(19, 'administrator', 1473404641, 0, '登陆成功'),
(20, 'administrator', 1473405524, 0, '登陆成功'),
(21, 'administrator', 1473405870, 0, '登陆成功'),
(22, 'administrator', 1473406004, 0, '登陆成功'),
(23, 'administrator', 1473406087, 0, '登陆成功'),
(24, 'administrator', 1473406223, 0, '登陆成功'),
(25, 'administrator', 1473407208, 0, '登陆失败'),
(26, 'administrator', 1473407357, 0, '登陆成功'),
(27, 'administrator', 1473411513, 0, '登陆成功'),
(28, 'administrator', 1473413938, 0, '登陆成功'),
(29, 'administrator', 1473468172, 0, '登陆成功'),
(30, 'administrator', 1473643284, 0, '登陆成功'),
(31, 'administrator', 1473644080, 0, '登陆成功'),
(32, 'administrator', 1473644158, 0, '登陆成功'),
(33, 'administrator', 1473644205, 0, '登陆成功'),
(34, 'administrator', 1473644300, 0, '登陆成功'),
(35, 'administrator', 1473644543, 0, '登陆成功'),
(36, 'administrator', 1473644954, 0, '登陆成功'),
(37, 'administrator', 1473645020, 0, '登陆成功'),
(38, 'administrator', 1473645110, 0, '登陆成功'),
(39, 'administrator', 1473645139, 0, '登陆成功'),
(40, 'administrator', 1473645178, 0, '登陆成功'),
(41, 'administrator', 1473645219, 0, '登陆成功'),
(42, 'administrator', 1473645266, 0, '登陆成功'),
(43, 'administrator', 1473645626, 0, '登陆成功'),
(44, 'administrator', 1473645646, 0, '登陆成功'),
(45, 'administrator', 1473645672, 0, '登陆成功'),
(46, 'administrator', 1473645707, 0, '登陆成功'),
(47, 'administrator', 1473646015, 0, '登陆成功'),
(48, 'administrator', 1473646245, 0, '登陆成功'),
(49, 'administrator', 1473647307, 0, '登陆成功'),
(50, 'administrator', 1473648122, 0, '登陆成功'),
(51, 'administrator', 1473648306, 0, '登陆成功'),
(52, 'administrator', 1473648383, 0, '登陆成功'),
(53, 'administrator', 1473648444, 0, '登陆成功'),
(54, 'administrator', 1473648829, 0, '登陆成功'),
(55, 'administrator', 1473648901, 0, '登陆成功'),
(56, 'administrator', 1473649084, 0, '登陆成功'),
(57, 'administrator', 1473649154, 0, '登陆成功'),
(58, 'administrator', 1473651471, 0, '登陆成功'),
(59, 'administrator', 1473652140, 0, '登陆成功'),
(60, 'administrator', 1473652160, 0, '登陆成功'),
(61, 'administrator', 1473660709, 0, '登陆成功'),
(62, 'administrator', 1473664723, 0, '登陆成功'),
(63, 'administrator', 1473665073, 0, '登陆成功'),
(64, 'administrator', 1473666180, 0, '登陆成功'),
(65, 'administrator', 1473672706, 0, '新增菜单，名称：测试'),
(66, 'administrator', 1473673307, 0, '新增菜单，名称：测试2'),
(67, 'administrator', 1473686700, 0, '登陆成功'),
(68, 'administrator', 1473688017, 0, '登陆成功'),
(69, 'administrator', 1473688073, 0, '登陆成功'),
(70, 'administrator', 1473689029, 0, '登陆成功'),
(71, 'administrator', 1473757372, 0, '登陆成功'),
(72, 'administrator', 1473768416, 0, '登陆成功'),
(73, 'administrator', 1473778393, 0, '登陆成功'),
(74, 'administrator', 1473778432, 0, '登陆成功'),
(75, 'administrator', 1473780420, 0, '登陆成功'),
(76, 'administrator', 1473817224, 0, '登陆成功'),
(77, 'administrator', 1474017307, 0, '登陆成功'),
(78, 'administrator', 1474108962, 0, '登陆成功'),
(79, 'administrator', 1474111045, 0, '登陆成功'),
(80, 'administrator', 1474111369, 0, '登陆成功'),
(81, 'administrator', 1474111777, 0, '登陆成功'),
(82, 'administrator', 1474113285, 0, '登陆成功'),
(83, 'administrator', 1474113709, 0, '登陆成功'),
(84, 'administrator', 1474114334, 0, '登陆成功'),
(85, 'administrator', 1474115496, 0, '登陆成功'),
(86, 'administrator', 1474115900, 0, '新增菜单，名称：测试1'),
(87, 'administrator', 1474115966, 0, '新增菜单，名称：测试2'),
(88, 'administrator', 1474118948, 0, '登陆成功'),
(89, 'administrator', 1474119575, 0, '登陆成功'),
(90, 'administrator', 1474124238, 0, '登陆成功'),
(91, 'administrator', 1474125030, 0, '登陆成功'),
(92, 'administrator', 1474127398, 0, '登陆成功'),
(93, 'administrator', 1474127839, 0, '登陆成功'),
(94, 'administrator', 1474163528, 0, '登陆成功'),
(95, 'administrator', 1474164585, 0, '登陆成功'),
(96, 'administrator', 1474165602, 0, '登陆成功'),
(97, 'administrator', 1474167068, 0, '登陆成功'),
(98, 'administrator', 1474167718, 0, '新增用户组，ID:0,组名：超级管理员'),
(99, 'administrator', 1474168087, 0, '新增用户组，ID:0,组名：管理员'),
(100, 'administrator', 1474191163, 0, '新增会员，会员UID：4'),
(101, 'administrator', 1474191341, 0, '新增会员，会员UID：5'),
(102, 'administrator', 1474191802, 0, '新增会员，会员UID：6'),
(103, 'administrator', 1474192011, 0, '新增会员，会员UID：7'),
(104, 'administrator', 1474207635, 0, '登陆成功'),
(105, 'administrator', 1474208033, 0, '登陆失败'),
(106, 'administrator', 1474208267, 0, '登陆失败'),
(107, 'administrator', 1474208672, 0, '登陆成功'),
(108, 'administrator', 1474208875, 0, '登陆成功'),
(109, 'administrator', 1474208965, 0, '登陆成功'),
(110, 'administrator', 1474209074, 0, '登陆成功'),
(111, 'administrator', 1474209129, 0, '登陆成功'),
(112, 'administrator', 1474209274, 0, '登陆成功'),
(113, 'administrator', 1474209312, 0, '登陆成功'),
(114, 'administrator', 1474209348, 0, '登陆成功'),
(115, 'administrator', 1474209422, 0, '登陆成功'),
(116, 'administrator', 1474209541, 0, '登陆成功'),
(117, 'administrator', 1474210026, 0, '登陆成功'),
(118, 'administrator', 1474210251, 0, '新增会员，会员UID：8'),
(119, 'huang', 1474210429, 0, '登陆失败'),
(120, 'administrator', 1474210453, 0, '登陆成功'),
(121, 'huang', 1474210489, 0, '登陆成功'),
(122, 'administrator', 1474210580, 0, '登陆成功'),
(123, 'administrator', 1474210671, 0, '登陆成功'),
(124, 'administrator', 1474210731, 0, '新增会员，会员UID：9'),
(125, 'admin', 1474211122, 0, '登陆失败'),
(126, 'administrator', 1474211141, 0, '登陆成功'),
(127, 'administrator', 1474211528, 0, '登陆失败'),
(128, 'administrator', 1474211570, 0, '登陆成功'),
(129, 'administrator', 1474211798, 0, '新增会员，会员UID：10'),
(130, 'administrator', 1474213219, 0, '删除会员UID：'),
(131, 'administrator', 1474213272, 0, '新增会员，会员UID：11'),
(132, 'administrator', 1474213328, 0, '新增会员，会员UID：12'),
(133, 'administrator', 1474214893, 0, '登陆成功'),
(134, 'administrator', 1474214978, 0, '新增菜单，名称：用户及组'),
(135, 'administrator', 1474215100, 0, '新增菜单，名称：用户管理'),
(136, 'administrator', 1474215150, 0, '新增菜单，名称：新增用户'),
(137, 'administrator', 1474215184, 0, '新增菜单，名称：用户组管理'),
(138, 'administrator', 1474215210, 0, '编辑菜单，ID：8'),
(139, 'administrator', 1474215242, 0, '编辑菜单，ID：8'),
(140, 'administrator', 1474215276, 0, '编辑菜单，ID：8'),
(141, 'administrator', 1474215309, 0, '编辑菜单，ID：7'),
(142, 'administrator', 1474215347, 0, '新增菜单，名称：新增用户组'),
(143, 'administrator', 1474215891, 0, '删除菜单ID：4'),
(144, 'administrator', 1474215999, 0, '删除菜单ID：4'),
(145, 'administrator', 1474216013, 0, '删除菜单ID：3'),
(146, 'administrator', 1474216028, 0, '编辑菜单，ID：7'),
(147, 'administrator', 1474216255, 0, '新增菜单，名称：首页'),
(148, 'administrator', 1474216534, 0, '登陆成功'),
(149, 'administrator', 1474216727, 0, '新增菜单，名称：首页统计'),
(150, 'administrator', 1474248694, 0, '编辑菜单，ID：8'),
(151, 'administrator', 1474248723, 0, '编辑菜单，ID：7'),
(152, 'administrator', 1474251854, 0, '登陆成功'),
(153, 'administrator', 1474252243, 0, '新增菜单，名称：网站配置'),
(154, 'administrator', 1474252367, 0, '编辑菜单，ID：5'),
(155, 'administrator', 1474252443, 0, '新增菜单，名称：网站配置'),
(156, 'administrator', 1474252504, 0, '编辑菜单，ID：12'),
(157, 'administrator', 1474252732, 0, '新增菜单，名称：菜单管理'),
(158, 'administrator', 1474252790, 0, '新增菜单，名称：新增菜单'),
(159, 'administrator', 1474252890, 0, '新增菜单，名称：分类管理'),
(160, 'administrator', 1474252914, 0, '删除菜单ID：16'),
(161, 'administrator', 1474252945, 0, '新增菜单，名称：分类管理'),
(162, 'administrator', 1474253069, 0, '登陆成功'),
(163, 'administrator', 1474253117, 0, '新增菜单，名称：数据库备份'),
(164, 'administrator', 1474254469, 0, '登陆成功'),
(165, 'administrator', 1474254867, 0, '登陆成功'),
(166, 'administrator', 1474255118, 0, '编辑菜单，ID：11'),
(167, 'administrator', 1474255141, 0, '编辑菜单，ID：10'),
(168, 'administrator', 1474255363, 0, '编辑菜单，ID：12'),
(169, 'administrator', 1474255387, 0, '编辑菜单，ID：13'),
(170, 'administrator', 1474255420, 0, '编辑菜单，ID：14'),
(171, 'administrator', 1474255437, 0, '编辑菜单，ID：15'),
(172, 'administrator', 1474255448, 0, '编辑菜单，ID：17'),
(173, 'administrator', 1474255460, 0, '编辑菜单，ID：18'),
(174, 'administrator', 1474255496, 0, '编辑菜单，ID：9'),
(175, 'administrator', 1474255504, 0, '编辑菜单，ID：8'),
(176, 'administrator', 1474255515, 0, '编辑菜单，ID：7'),
(177, 'administrator', 1474255525, 0, '编辑菜单，ID：6'),
(178, 'administrator', 1474255683, 0, '编辑菜单，ID：5'),
(179, 'administrator', 1474255863, 0, '编辑菜单，ID：1'),
(180, 'administrator', 1474257407, 0, '编辑用户组，ID:2,组名：管理员'),
(181, 'administrator', 1474257523, 0, '新增用户组，ID:0,组名：会员'),
(182, 'guan', 1474257595, 0, '登陆成功'),
(183, 'administrator', 1474257638, 0, '登陆成功'),
(184, 'guan', 1474259162, 0, '登陆成功'),
(185, 'administrator', 1474259193, 0, '登陆成功'),
(186, 'administrator', 1474259245, 0, '新增会员，会员UID：13'),
(187, 'admin', 1474259270, 0, '登陆成功'),
(188, 'administrator', 1474259626, 0, '登陆成功'),
(189, 'guan', 1474260527, 0, '登陆成功'),
(190, 'administrator', 1474260750, 0, '登陆成功'),
(191, 'administrator', 1474266343, 0, '新增菜单，名称：测试'),
(192, 'admin', 1474267969, 0, '登陆成功'),
(193, 'administrator', 1474268010, 0, '登陆成功'),
(194, 'administrator', 1474268041, 0, '删除菜单ID：19'),
(195, 'administrator', 1474269400, 0, '编辑用户组，ID:2,组名：管理员'),
(196, 'guan', 1474269453, 0, '登陆成功'),
(197, 'administrator', 1474269479, 0, '登陆成功'),
(198, 'administrator', 1474269491, 0, '编辑用户组，ID:2,组名：管理员'),
(199, 'guan', 1474269527, 0, '登陆成功'),
(200, 'administrator', 1474269552, 0, '登陆成功'),
(201, 'administrator', 1474269625, 0, '新增菜单，名称：测试'),
(202, 'administrator', 1474270482, 0, '登陆成功'),
(203, 'administrator', 1474270827, 0, '新增菜单，名称：测试'),
(204, 'administrator', 1474272130, 0, '新增菜单，名称：测试1'),
(205, 'administrator', 1474272966, 0, '新增菜单，名称：adsf'),
(206, 'administrator', 1474274721, 0, '新增菜单，名称：3'),
(207, 'administrator', 1474275155, 0, '删除菜单ID：24'),
(208, 'administrator', 1474275161, 0, '删除菜单ID：23'),
(209, 'administrator', 1474275175, 0, '删除菜单ID：21'),
(210, 'administrator', 1474275190, 0, '删除菜单ID：22'),
(211, 'administrator', 1474275406, 0, '新增菜单，名称：全部文章'),
(212, 'administrator', 1474275667, 0, '新增菜单，名称：走进康兴'),
(213, 'administrator', 1474276005, 0, '编辑菜单，ID：26'),
(214, 'administrator', 1474276259, 0, '新增菜单，名称：关于康兴'),
(215, 'administrator', 1474276463, 0, '编辑菜单，ID：27'),
(216, 'administrator', 1474276509, 0, '编辑菜单，ID：27'),
(217, 'administrator', 1474276549, 0, '编辑菜单，ID：27'),
(218, 'administrator', 1474276739, 0, '新增菜单，名称：康兴故事'),
(219, 'administrator', 1474276808, 0, '新增菜单，名称：康兴发展史'),
(220, 'administrator', 1474276843, 0, '新增菜单，名称：资质荣誉'),
(221, 'administrator', 1474276873, 0, '新增菜单，名称：企业文化'),
(222, 'administrator', 1474276898, 0, '新增菜单，名称：董事长致辞'),
(223, 'administrator', 1474276915, 0, '删除菜单ID：31'),
(224, 'administrator', 1474276920, 0, '删除菜单ID：32'),
(225, 'administrator', 1474276964, 0, '新增菜单，名称：企业文化'),
(226, 'administrator', 1474276991, 0, '新增菜单，名称：董事长致辞'),
(227, 'administrator', 1474277056, 0, '新增菜单，名称：临床评价'),
(228, 'administrator', 1474277127, 0, '新增菜单，名称：高端医用医疗器械'),
(229, 'administrator', 1474277175, 0, '新增菜单，名称：高端家用医疗 器械'),
(230, 'administrator', 1474277275, 0, '新增菜单，名称：产品及解决方案'),
(231, 'administrator', 1474277379, 0, '新增菜单，名称：康兴产品耗材与配件'),
(232, 'administrator', 1474277438, 0, '新增菜单，名称：高端家用医疗器械'),
(233, 'administrator', 1474277484, 0, '新增菜单，名称：高端医用医疗器械'),
(234, 'administrator', 1474277548, 0, '新增菜单，名称：成功案列'),
(235, 'administrator', 1474277589, 0, '新增菜单，名称：客户服务'),
(236, 'administrator', 1474277616, 0, '新增菜单，名称：新闻中心'),
(237, 'administrator', 1474277643, 0, '新增菜单，名称：联系我们'),
(238, 'administrator', 1474277666, 0, '新增菜单，名称：官方微信'),
(239, 'administrator', 1474277687, 0, '新增菜单，名称：荣誉资质'),
(240, 'administrator', 1474277754, 0, '新增菜单，名称：新闻速递'),
(241, 'administrator', 1474277773, 0, '新增菜单，名称：社交媒体'),
(242, 'administrator', 1474277826, 0, '新增菜单，名称：保养检修'),
(243, 'administrator', 1474277851, 0, '新增菜单，名称：日常保养'),
(244, 'administrator', 1474277885, 0, '新增菜单，名称：故障处理'),
(245, 'administrator', 1474277909, 0, '新增菜单，名称：使用说明'),
(246, 'administrator', 1474277943, 0, '新增菜单，名称：常见问题'),
(247, 'administrator', 1474277967, 0, '新增菜单，名称：客服中心'),
(248, 'administrator', 1474277989, 0, '新增菜单，名称：培训学院'),
(249, 'administrator', 1474278010, 0, '新增菜单，名称：技术支持'),
(250, 'administrator', 1474278137, 0, '登陆成功'),
(251, 'guan', 1474290590, 0, '登陆成功'),
(252, 'admin', 1474290649, 0, '登陆成功'),
(253, 'administrator', 1474290728, 0, '登陆成功'),
(254, 'administrator', 1474291242, 0, '登陆成功'),
(255, 'guan', 1474291442, 0, '登陆成功'),
(256, 'administrator', 1474291480, 0, '登陆成功'),
(257, 'administrator', 1474292167, 0, '登陆成功'),
(258, 'administrator', 1474335878, 0, '登陆成功'),
(259, 'administrator', 1474336531, 0, '登陆成功'),
(260, 'administrator', 1474337799, 0, '登陆成功'),
(261, 'administrator', 1474338362, 0, '登陆成功'),
(262, 'administrator', 1474341857, 0, '登陆成功'),
(263, 'administrator', 1474422245, 0, '登陆成功'),
(264, 'administrator', 1474424144, 0, '登陆成功'),
(265, 'administrator', 1474429115, 0, '登陆成功'),
(266, 'administrator', 1474432242, 0, '新增会员，会员UID：14'),
(267, 'administrator', 1474432251, 0, '删除会员UID：'),
(268, 'administrator', 1474434053, 0, '登陆成功'),
(269, 'administrator', 1474434129, 0, '编辑会员信息，会员UID：11'),
(270, 'administrator', 1474444482, 0, '删除会员UID：'),
(271, 'administrator', 1474444509, 0, '新增会员，会员UID：15'),
(272, '', 1474452323, 0, '登陆失败'),
(273, '', 1474452365, 0, '登陆失败'),
(274, '', 1474452605, 0, '登陆失败'),
(275, '', 1474452732, 0, '登陆失败'),
(276, '', 1474452810, 0, '登陆失败'),
(277, 'administrator', 1474533335, 0, '登陆失败'),
(278, 'administrator', 1474533349, 0, '登陆失败'),
(279, 'administrator', 1474534114, 0, '登陆失败'),
(280, 'administrator', 1474536131, 0, '登陆成功'),
(281, 'administrator', 1474536256, 0, '登陆成功'),
(282, 'administrator', 1474536338, 0, '登陆成功'),
(283, 'administrator', 1474537035, 0, '登陆成功'),
(284, 'administrator', 1474537084, 0, '编辑菜单，ID：1'),
(285, 'administrator', 1474537109, 0, '编辑菜单，ID：1'),
(286, 'administrator', 1474537128, 0, '编辑菜单，ID：1'),
(287, 'administrator', 1474537339, 0, '编辑菜单，ID：1'),
(288, 'administrator', 1474537353, 0, '编辑菜单，ID：25'),
(289, 'administrator', 1474537367, 0, '编辑菜单，ID：5'),
(290, 'administrator', 1474537380, 0, '编辑菜单，ID：12'),
(291, 'administrator', 1474537610, 0, '登陆成功'),
(292, 'administrator', 1474537681, 0, '登陆成功'),
(293, 'administrator', 1474538099, 0, '登陆成功'),
(294, 'administrator', 1474538725, 0, '登陆成功'),
(295, 'administrator', 1474545957, 0, '登陆成功'),
(296, 'administrator', 1474618211, 0, '登陆成功'),
(297, 'administrator', 1474618297, 0, '新增菜单，名称：测试'),
(298, 'administrator', 1474769586, 0, '登陆成功'),
(299, 'administrator', 1474769623, 0, '编辑菜单，ID：58'),
(300, 'administrator', 1474769749, 0, '删除菜单ID：58'),
(301, 'administrator', 1474775396, 0, '登陆成功'),
(302, 'administrator', 1474872992, 127, '登陆成功'),
(303, 'administrator', 1476753456, 0, '登陆成功'),
(304, 'administrator', 1476753589, 0, '新增菜单，名称：考勤系统'),
(305, 'administrator', 1476753622, 0, '新增菜单，名称：员工信息录入'),
(306, 'administrator', 1476754655, 0, '新增菜单，名称：员工基本信息'),
(307, 'administrator', 1476754722, 0, '新增菜单，名称：年假查询'),
(308, 'administrator', 1476754748, 0, '编辑菜单，ID：60'),
(309, 'administrator', 1476754759, 0, '编辑菜单，ID：61'),
(310, 'administrator', 1476754771, 0, '编辑菜单，ID：62'),
(311, 'administrator', 1476754797, 0, '编辑菜单，ID：59'),
(312, 'administrator', 1476764703, 0, '新增菜单，名称：部门管理'),
(313, 'administrator', 1476765229, 0, '编辑菜单，ID：63'),
(314, 'administrator', 1476772452, 0, '登陆成功'),
(315, 'administrator', 1476772499, 0, '编辑菜单，ID：63'),
(316, 'administrator', 1476779192, 0, '新增部门，ID:'),
(317, 'administrator', 1476779218, 0, '编辑部门，ID：5'),
(318, 'administrator', 1476779429, 0, '新增部门，ID:6'),
(319, 'administrator', 1476779908, 0, '新增部门，部门ID:7'),
(320, 'administrator', 1476779923, 0, '删除部门，部门ID:7'),
(321, 'administrator', 1476783076, 0, '登陆成功'),
(322, 'administrator', 1476783797, 0, '编辑菜单，ID：60'),
(323, 'administrator', 1476783826, 0, '编辑菜单，ID：61'),
(324, 'administrator', 1476783863, 0, '编辑菜单，ID：61'),
(325, 'administrator', 1476840295, 0, '登陆成功'),
(326, 'administrator', 1476841984, 0, '编辑菜单，ID：61'),
(327, 'administrator', 1476842015, 0, '编辑菜单，ID：60'),
(328, 'administrator', 1476842089, 0, '编辑菜单，ID：60'),
(329, 'administrator', 1476846466, 127, '登陆成功'),
(330, 'administrator', 1476857652, 0, '登陆成功'),
(331, 'administrator', 1476867904, 0, '新增菜单，名称：职位管理'),
(332, 'administrator', 1476867936, 0, '编辑菜单，ID：64'),
(333, 'administrator', 1476868006, 0, '删除菜单ID：Array'),
(334, 'administrator', 1476870195, 0, '登陆成功'),
(335, 'administrator', 1476871104, 0, '新增会员，会员UID：102'),
(336, 'administrator', 1476871360, 127, '登陆成功'),
(337, 'administrator', 1476872753, 127, '新增会员，会员UID：103'),
(338, 'administrator', 1476925686, 127, '登陆成功'),
(339, 'administrator', 1476925842, 127, '登陆成功'),
(340, 'administrator', 1476937394, 127, '新增部门，部门ID:8'),
(341, 'administrator', 1476940466, 127, '编辑会员信息，会员UID：103'),
(342, 'administrator', 1476940782, 127, '编辑会员信息，会员UID：103'),
(343, 'administrator', 1476941136, 127, '编辑会员信息，会员UID：102'),
(344, 'administrator', 1476943763, 127, '新增会员，会员UID：104'),
(345, '小明', 1476943881, 127, '登陆成功'),
(346, 'administrator', 1476944045, 127, '登陆成功'),
(347, 'administrator', 1476944174, 127, '新增菜单，名称：请假申请'),
(348, 'administrator', 1476944211, 127, '编辑菜单，ID：65'),
(349, 'administrator', 1476950133, 127, '新增员工，员工号：1'),
(350, 'administrator', 1476951979, 127, '编辑员工信息，员工号：1'),
(351, 'administrator', 1476952535, 127, '登陆成功'),
(352, 'administrator', 1476952781, 127, '登陆成功'),
(353, 'administrator', 1476952837, 127, '编辑员工信息，员工号：1'),
(354, 'administrator', 1476952842, 127, '编辑员工信息，员工号：1'),
(355, 'administrator', 1476952855, 127, '编辑员工信息，员工号：1'),
(356, 'administrator', 1476952863, 127, '编辑员工信息，员工号：1'),
(357, 'administrator', 1476953352, 127, '登陆成功'),
(358, 'administrator', 1476953542, 127, '编辑员工信息，员工号：1'),
(359, 'administrator', 1476953903, 127, '编辑员工信息，员工号：1'),
(360, 'administrator', 1476957189, 127, '新增部门，部门ID:9'),
(361, 'administrator', 1476957721, 127, '新增部门，部门ID:10'),
(362, 'administrator', 1476957911, 127, '删除部门，部门ID:10'),
(363, 'administrator', 1476958013, 127, '编辑员工信息，员工号：1'),
(364, 'administrator', 1476958031, 127, '编辑员工信息，员工号：1'),
(365, 'administrator', 1476958803, 127, '编辑员工信息，员工号：1'),
(366, 'administrator', 1476959370, 127, '编辑员工信息，员工号：1'),
(367, 'administrator', 1476959429, 127, '编辑员工信息，员工号：1'),
(368, 'administrator', 1476961326, 127, '新增职位，职位ID:1'),
(369, 'administrator', 1476961359, 127, '新增职位，职位ID:2'),
(370, 'administrator', 1476961374, 127, '编辑职位，职位ID：2'),
(371, 'administrator', 1476961386, 127, '删除职位，职位ID:2');

-- --------------------------------------------------------

--
-- 表的结构 `think_member`
--

CREATE TABLE `think_member` (
  `id` int(5) NOT NULL COMMENT '用户Id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '用户密码',
  `employee_no` int(11) DEFAULT NULL COMMENT '员工号',
  `now_department_id` int(11) NOT NULL COMMENT '现任部门id',
  `in_department_id` int(11) NOT NULL COMMENT '入职部门id',
  `now_position_id` int(11) NOT NULL COMMENT '现任职位id',
  `in_position_id` int(11) NOT NULL COMMENT '入职职位id',
  `superior` varchar(100) NOT NULL COMMENT '直属上级',
  `work_addr` varchar(255) NOT NULL COMMENT '办公地',
  `card_id` int(11) NOT NULL COMMENT '身份证号码',
  `pay_card` int(11) NOT NULL COMMENT '工资卡号',
  `sex` tinyint(1) UNSIGNED DEFAULT '0' COMMENT '性别 0 男 1 女',
  `birthday` int(11) NOT NULL COMMENT '生日',
  `phone` int(11) NOT NULL COMMENT '手机号码',
  `constellation` varchar(255) NOT NULL COMMENT '星座',
  `company_email` varchar(255) NOT NULL COMMENT '公司邮箱',
  `person_email` varchar(255) NOT NULL COMMENT '私人邮箱',
  `qq` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL COMMENT '学历',
  `major` varchar(255) NOT NULL COMMENT '专业',
  `school` varchar(255) NOT NULL COMMENT '毕业院校',
  `end_time` int(11) NOT NULL COMMENT '毕业时间',
  `home_tel` int(11) NOT NULL COMMENT '家庭电话',
  `home_addr` text NOT NULL COMMENT '家庭地址',
  `location` text NOT NULL COMMENT '户口地址',
  `join_date` int(11) NOT NULL COMMENT '入职日期',
  `sign_date` int(11) NOT NULL COMMENT '合同签署日期',
  `full_time` int(11) NOT NULL COMMENT '合同期满日期(3年)',
  `continue1` int(11) NOT NULL COMMENT '续签期满日期',
  `continue2` int(11) NOT NULL COMMENT '续签期满日期',
  `continue3` int(11) NOT NULL COMMENT '续签期满日期',
  `probation_half` int(11) NOT NULL COMMENT '试用期过半日期',
  `probation_full` int(11) NOT NULL COMMENT '试用期满日期',
  `is_internship` tinyint(4) NOT NULL COMMENT '是否实习 1 是 2 否',
  `is_turn` tinyint(4) NOT NULL COMMENT '是否转正 1 是 2 否',
  `urgent_contact` varchar(100) NOT NULL COMMENT '紧急联系人',
  `contact_tel` int(11) NOT NULL COMMENT '紧急联系人电话',
  `is_leave` tinyint(4) NOT NULL COMMENT '是否离职  1 是 2 否',
  `leave_date` int(11) NOT NULL COMMENT '离职日期',
  `age` tinyint(1) DEFAULT NULL COMMENT '年龄',
  `avatar` varchar(20) DEFAULT '1.jpg' COMMENT '用户头像',
  `create_time` int(11) DEFAULT NULL COMMENT '注册时间',
  `login_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录用户当前登录的时间',
  `login_ip` varchar(32) DEFAULT NULL,
  `logout_time` int(11) NOT NULL DEFAULT '0' COMMENT '记录用户退出时的时间',
  `login_number` int(11) NOT NULL DEFAULT '0' COMMENT '记录用户的登录次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:启用 -1禁用',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为普通用户，1：管理员用户'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `think_member`
--

INSERT INTO `think_member` (`id`, `username`, `password`, `employee_no`, `now_department_id`, `in_department_id`, `now_position_id`, `in_position_id`, `superior`, `work_addr`, `card_id`, `pay_card`, `sex`, `birthday`, `phone`, `constellation`, `company_email`, `person_email`, `qq`, `degree`, `major`, `school`, `end_time`, `home_tel`, `home_addr`, `location`, `join_date`, `sign_date`, `full_time`, `continue1`, `continue2`, `continue3`, `probation_half`, `probation_full`, `is_internship`, `is_turn`, `urgent_contact`, `contact_tel`, `is_leave`, `leave_date`, `age`, `avatar`, `create_time`, `login_time`, `login_ip`, `logout_time`, `login_number`, `status`, `type`) VALUES
(11, 'guan', '615af2485cec30a44ba3e984f44405fd', NULL, 0, 0, 0, 0, '', '', 0, 0, NULL, 0, 0, '', '', '', 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', 1474434129, 0, NULL, 0, 0, 1, 0),
(12, 'huang', '87d6011ac290001e3037197c5bede68b', NULL, 0, 0, 0, 0, '', '', 0, 0, NULL, 0, 0, '', '', '', 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', 1474213328, 0, NULL, 0, 0, 1, 0),
(15, 'sdfg', '87d6011ac290001e3037197c5bede68b', NULL, 0, 0, 0, 0, '', '', 0, 0, NULL, 0, 0, '', '', '', 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', 1474444509, 0, NULL, 0, 0, 1, 0),
(1, 'administrator', '87d6011ac290001e3037197c5bede68b', NULL, 0, 0, 0, 0, '', '', 0, 0, 1, 0, 0, '', '', '', 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', NULL, 0, NULL, 0, 0, 1, 0),
(101, '黄方林', '', 10000, 0, 0, 0, 0, '马忠良', '深圳', 450902, 12424274, 1, 0, 0, '处女座', '78787@mediaV.com', '773157920@qq.com', 773157920, '本科', '智能科学与技术', '桂林电子科技大学', 2015, 1337725, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', NULL, 0, NULL, 0, 0, 1, 0),
(102, '黄方林', '87d6011ac290001e3037197c5bede68b', 100000, 3, 4, 0, 0, '', '', 0, 0, 1, 0, 0, '', '', '', 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', 1476941136, 0, NULL, 0, 0, 1, 0),
(103, '黄', '87d6011ac290001e3037197c5bede68b', NULL, 4, 1, 0, 0, '', '', 0, 0, 1, 0, 0, '', '', '', 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', 1476940782, 0, NULL, 0, 0, 1, 0),
(104, '小明', '87d6011ac290001e3037197c5bede68b', NULL, 4, 5, 0, 0, '', '', 0, 0, 1, 0, 0, '', '', '', 0, '', '', '', 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, NULL, '1.jpg', 1476943763, 0, NULL, 0, 0, 1, 0),
(105, '明明', '87d6011ac290001e3037197c5bede68b', 1, 4, 4, 0, 0, '领导', '', 111, 222, 1, 1475510400, 333, '天蝎', '444', '555', 666, '3', '白痴', '智障', 1469116800, 777, '深圳', '宝安', 1476806400, 1476806400, 1477065600, 1476892800, 1477584000, 1477670400, 1477411200, 1476892800, 2, 2, '获奖', 888, 2, 1476892800, NULL, '1.jpg', 1476959429, 0, NULL, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `think_message`
--

CREATE TABLE `think_message` (
  `id` int(11) NOT NULL COMMENT 'id',
  `name` varchar(32) DEFAULT NULL COMMENT '姓名',
  `email` varchar(32) DEFAULT NULL COMMENT '邮箱',
  `company` varchar(32) DEFAULT NULL COMMENT '公司',
  `phone` int(11) DEFAULT NULL COMMENT '电话',
  `address` varchar(64) DEFAULT NULL COMMENT '地址',
  `message` varchar(120) DEFAULT NULL COMMENT '信息',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `status` int(11) DEFAULT '0' COMMENT '状态'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_position`
--

CREATE TABLE `think_position` (
  `id` int(11) NOT NULL,
  `position` varchar(200) NOT NULL COMMENT '职位',
  `remark` text NOT NULL COMMENT '备注'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='职位表';

--
-- 转存表中的数据 `think_position`
--

INSERT INTO `think_position` (`id`, `position`, `remark`) VALUES
(1, 'PHP程序员', '我只是一名搬运工  \r\n                                ');

-- --------------------------------------------------------

--
-- 表的结构 `think_setting`
--

CREATE TABLE `think_setting` (
  `k` varchar(100) NOT NULL COMMENT '变量',
  `v` varchar(255) NOT NULL COMMENT '值',
  `type` tinyint(1) NOT NULL COMMENT '0 系统， 1 自定义 ',
  `name` varchar(255) NOT NULL COMMENT '说明'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE `think_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(32) NOT NULL,
  `department` varchar(255) NOT NULL COMMENT '现任部门',
  `position` varchar(255) NOT NULL COMMENT '现任职位',
  `superior` varchar(200) NOT NULL COMMENT '直属上级',
  `sex` tinyint(4) NOT NULL DEFAULT '1',
  `card_id` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `person_email` varchar(255) NOT NULL,
  `qq` int(11) NOT NULL,
  `home_tel` int(11) NOT NULL,
  `home_address` varchar(255) NOT NULL COMMENT '家庭住址',
  `location` varchar(255) NOT NULL COMMENT '户口地址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `think_auth_group`
--
ALTER TABLE `think_auth_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_auth_group_access`
--
ALTER TABLE `think_auth_group_access`
  ADD UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_department`
--
ALTER TABLE `think_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_education`
--
ALTER TABLE `think_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_log`
--
ALTER TABLE `think_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_member`
--
ALTER TABLE `think_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_message`
--
ALTER TABLE `think_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_position`
--
ALTER TABLE `think_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `think_setting`
--
ALTER TABLE `think_setting`
  ADD PRIMARY KEY (`k`);

--
-- Indexes for table `think_user`
--
ALTER TABLE `think_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `think_auth_group`
--
ALTER TABLE `think_auth_group`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `think_auth_rule`
--
ALTER TABLE `think_auth_rule`
  MODIFY `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- 使用表AUTO_INCREMENT `think_department`
--
ALTER TABLE `think_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `think_education`
--
ALTER TABLE `think_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `think_log`
--
ALTER TABLE `think_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=372;
--
-- 使用表AUTO_INCREMENT `think_member`
--
ALTER TABLE `think_member`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '用户Id', AUTO_INCREMENT=106;
--
-- 使用表AUTO_INCREMENT `think_message`
--
ALTER TABLE `think_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- 使用表AUTO_INCREMENT `think_position`
--
ALTER TABLE `think_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `think_user`
--
ALTER TABLE `think_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
