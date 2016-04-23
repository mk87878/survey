-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016-04-20 04:48:03
-- 服务器版本： 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `an1` varchar(5000) DEFAULT NULL,
  `an2` varchar(5000) DEFAULT NULL,
  `stuId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `question` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `ans1` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans2` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans3` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans4` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans5` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans6` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans7` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans8` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `ans9` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `ans10` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `ans11` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `stuMajor` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`id`, `question`, `type`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`, `ans6`, `ans7`, `ans8`, `ans9`, `ans10`, `ans11`, `stuMajor`) VALUES
(1, '您的毕业年份', 1, '2015', '2014', '2013', '2012', '', '', '', '', '', '', '', '数字建模'),
(2, '您的入学类型\n', 1, '普通高中', '单独招生 \n', '五年一贯制 ', '', '', '', '', '', '', '', '', '数字建模'),
(3, '您在工作期间，多大程度运用了您在学校学习的东西', 1, '基本上能 \n', '偶尔', '经常 \n', '很大程度 ', '', '', '', '', '', '', '', '数字建模'),
(4, '您认为大学期间所学的课程能让自己找到满意的工作吗？\n', 1, '能 ', '基本上能 \n', '不能 \n', '不清楚 ', '', '', '', '', '', '', '', '数字建模'),
(5, '您认为在大学期间，学生应加强哪些方面的学习和提高，以应对毕业后的发展？\n', 3, '英语综合能力 ', '人际交往 \n', '专业知识 \n', '组织管理 \n', '办公软件技能 ', '综合素质 ', '时间管理 \n', '人文素养 \n', '其他：\n\n', '', '', '数字建模'),
(6, '您认为公共基础课程中，收获最大的课程是', 2, '高等数学 \n', '计算机基础 ', '体育', '大学生职业生涯规划 ', '大学英语 ', '创业创新教育 ', '形势与政策 \n', '', '', '', '', '数字建模'),
(7, '您认为公共基础课程中，对长远发展有用的课是', 2, '高等数学 \n', '计算机基础 ', '体育', '大学生职业生涯规划 ', '大学英语 ', '创业创新教育 ', '形势与政策 \n', '', '', '', '', '数字建模'),
(8, '您认为所学转学的专业课程设置是否合理？', 1, '非常合理 ', '基本合理', '完全不合理', '', '', '', '', '', '', '', '', '数字建模'),
(9, '您认为下列专业课程中，那些事本专业必须学习的', 3, '素描', '色彩', 'Photoshop平面设计', '音视频处理', 'VRAY渲染技术', '后期处理', '模型制作', '3DMAX三维动画 ', '如果有需要增设的课程，请写出：', '', '', '数字建模'),
(10, '您对本方向开设课程的整体评价', 4, '素描', '建筑识图与制图', '三维动画', '模型制作', 'VRAY渲染技术', '后期处理', '建筑表现综合实训', '', '', '', '', '数字建模'),
(11, '您认为在所学专业的课程教学中存在的问题主要有哪些？', 2, '培养目标定位不准确', '教学计划不合理 ', '教学方法单一 ', '专业与社会需求脱节', '实践教学环节不足 ', '教学内容陈旧 ', '', '', '', '', '', '数字建模'),
(12, '你喜欢老师用哪种教学方式？', 2, '启发式', '探究式', '讨论式', '合作式 ', '案例式', '问题式 ', '', '', '', '', '', '数字建模'),
(13, '您认为设置企业课堂，由企业教师指导进行实训是否有必要？', 1, '非常有必要', '没有必要', '无所谓 ', '', '', '', '', '', '', '', '', '数字建模'),
(14, '您认为本专业教学中，最需要改进的地方是？', 3, '实践环节不够 ', '培养主动学习能力不够', '课程内容陈旧', '培养批判性思维不够', '学生课堂参与不够 ', '其他：', '', '', '', '', '', '数字建模'),
(15, '您认为在您大学三年的生涯中，收获与提高最显著的是？', 2, '知识结构', '人际交往', '组织管理', '创新素质', '价值观 ', '专业技能 ', '独立适应', '责任心 ', '时间管理 ', '创新精神 ', '', '数字建模'),
(16, '为了适应未来职业生涯的发展，您认为应该增设哪些方面课程或进行哪些方面的培养？（可写于下面的框中）', 5, NULL, '', '', '', '', '', '', '', '', '', '', '数字建模'),
(17, '您的毕业年份', 1, '2015', '2014', '2013', '2012', '', '', '', '', '', '', '', '动态网站'),
(18, '您的入学类型', 1, '普通高中', '单独招生', '五年一贯制', '', '', '', '', '', '', '', '', '动态网站'),
(19, '您在工作期间，多大程度运用了您在学校学习的东西', 1, '基本上能', '偶尔 ', '经常 ', '很大程度', '', '', '', '', '', '', '', '动态网站'),
(20, '您认为大学期间所学的课程能让自己找到满意的工作吗？', 1, '能 ', '基本上能', '不能 ', '不清楚 ', '', '', '', '', '', '', '', '动态网站'),
(21, '您认为在大学期间，学生应加强哪些方面的学习和提高，以应对毕业后的发展？', 3, '英语综合能力', '人际交往', '专业知识', '组织管理 ', '办公软件技能 ', '综合素质', '时间管理', '人文素养', '其他：', '', '', '动态网站'),
(22, '您认为公共基础课程中，收获最大的课程是', 2, '高等数学 ', '计算机基础', '体育 ', '大学生职业生涯规划', '大学英语 ', '创业创新教育', '形势与政策', '', '', '', '', '动态网站'),
(23, '您认为公共基础课程中，对长远发展有用的课是', 2, '高等数学 ', '计算机基础', '体育 ', '大学生职业生涯规划', '大学英语 ', '创业创新教育', '形势与政策', '', '', '', '', '动态网站'),
(24, '您认为所学转学的专业课程设置是否合理？', 1, '非常合理 ', '基本合理 ', '完全不合理 ', '', '', '', '', '', '', '', '', '动态网站'),
(25, '您认为下列专业课程中，那些事本专业必须学习的', 3, '素描 ', '色彩 ', 'Photoshop平面设计', '音视频处理', 'VRAY渲染技术 ', '后期处理', '模型制作', '3DMAX三维动画 ', '如果有需要增设的课程，请写出：', '', '', '动态网站'),
(26, '您对本方向开设课程的整体评价', 4, '素描', '建筑识图与制图', '三维动画', '模型制作', 'VRAY渲染技术 ', '后期处理', '建筑表现综合', '实训', '', '', '', '动态网站'),
(27, '您认为在所学专业的课程教学中存在的问题主要有哪些？', 2, '培养目标定位不准确', '教学计划不合理', '教学方法单一', '专业与社会需求脱节', '实践教学环境不足', '教训内容陈旧', '', '', '', '', '', '动态网站'),
(28, '你喜欢老师用哪种教学方式？', 2, '启发式', '探究式', '讨论式', '合作式', '案例式', '问题式', '', '', '', '', '', '动态网站'),
(29, '您认为设置企业课堂，由企业教师指导进行实训是否有必要？', 1, '非常有必要', '没有必要', '无所谓', '', '', '', '', '', '', '', '', '动态网站'),
(30, '您认为本专业教学中，最需要改进的地方是？', 3, '实践环节不够 ', '培养主动学习能力不够 ', '课程内容陈旧 ', '培养批判性思维不够 ', '学生课堂参与不够 ', '其他：', '', '', '', '', '', '动态网站'),
(31, '您认为在您大学三年的生涯中，收获与提高最显著的是？', 2, '知识结构 ', '人际交往', '组织管理', '创新素质', '价值观', '专业技能', '独立适应', '责任心', '时间管理', '创新精神', '', '动态网站'),
(32, '为了适应未来职业生涯的发展，您认为应该增设哪些方面课程或进行哪些方面的培养？', 5, '', '', '', '', '', '', '', '', '', '', '', '动态网站');

-- --------------------------------------------------------

--
-- 表的结构 `stuInfo`
--

CREATE TABLE `stuInfo` (
  `num` int(11) NOT NULL,
  `stuName` varchar(300) NOT NULL,
  `stuMajor` varchar(300) NOT NULL,
  `stuYear` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf32;

--
-- 转存表中的数据 `stuInfo`
--

INSERT INTO `stuInfo` (`num`, `stuName`, `stuMajor`, `stuYear`) VALUES
(1, '1', '动态网站', 2012),
(2, '万玉婷', '计算机软件技术', 2012),
(3, '李琳', '计算机软件技术', 2012),
(4, '刘琴', '计算机软件技术', 2012),
(5, '杨松', '计算机软件技术', 2012),
(6, '杨景', '计算机软件技术', 2012),
(7, '宋捷', '计算机软件技术', 2012),
(8, '张浩然', '计算机软件技术', 2012),
(9, '刘伟', '计算机软件技术', 2012),
(10, '杨磊', '计算机软件技术', 2012),
(11, '温子龙', '计算机软件技术', 2012),
(12, '周禹', '计算机软件技术', 2012),
(13, '龙洋', '计算机软件技术', 2012),
(14, '王博宁', '计算机软件技术', 2012),
(15, '李慧超', '计算机软件技术', 2012),
(16, '邱杰', '计算机软件技术', 2012),
(17, '黄淼', '计算机软件技术', 2012),
(18, '朱鹏', '计算机软件技术', 2012),
(19, '韩俊松', '计算机软件技术', 2012),
(20, '郑银', '计算机软件技术', 2012),
(21, '张细波', '计算机软件技术', 2012),
(22, '宋铭珂', '计算机软件技术', 2012),
(23, '李想', '计算机软件技术', 2012),
(24, '陶源', '计算机软件技术', 2012),
(25, '谢冰杰', '计算机软件技术', 2012),
(26, '夏春', '计算机软件技术', 2012),
(27, '李中华', '计算机软件技术', 2012),
(28, '徐浪', '计算机软件技术', 2012),
(29, '周明建', '计算机软件技术', 2012),
(30, '胡志雄', '计算机软件技术', 2012);

-- --------------------------------------------------------

--
-- 表的结构 `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `surveyName` varchar(300) NOT NULL,
  `surveyFrom` varchar(300) NOT NULL,
  `time` year(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `survey`
--

INSERT INTO `survey` (`id`, `surveyName`, `surveyFrom`, `time`) VALUES
(1, '动态网站方向', '计算机应用技术专业', 2012);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuInfo`
--
ALTER TABLE `stuInfo`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `stuInfo`
--
ALTER TABLE `stuInfo`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
