/*
 Navicat Premium Data Transfer

 Source Server         : 本地库(MariaDB)
 Source Server Type    : MariaDB
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : lucki_search

 Target Server Type    : MariaDB
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 07/08/2023 20:39:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_engine
-- ----------------------------
DROP TABLE IF EXISTS `t_engine`;
CREATE TABLE `t_engine`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin NULL DEFAULT NULL,
  `placeholder` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin NULL DEFAULT NULL,
  `orders` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 118 CHARACTER SET = utf32 COLLATE = utf32_bin ROW_FORMAT = Redundant;

-- ----------------------------
-- Records of t_engine
-- ----------------------------
INSERT INTO `t_engine` VALUES (23, 1, 'F搜', 'https://fsoufsou.com/search?q=', '推荐使用', 1);
INSERT INTO `t_engine` VALUES (24, 1, 'Cat搜', 'https://woc.cool/search?q=', '推荐使用', 2);
INSERT INTO `t_engine` VALUES (25, 1, 'neeva', 'https://neeva.com/search?q=', '主打全球隐私型无广告搜索', 3);
INSERT INTO `t_engine` VALUES (26, 1, '百度', 'https://www.baidu.com/s?wd=', '百度一下', 4);
INSERT INTO `t_engine` VALUES (27, 1, 'Bing', 'https://cn.bing.com/search?q=', '微软Bing搜索', 5);
INSERT INTO `t_engine` VALUES (28, 1, 'SearX', 'https://darmarit.org/searx/search?q=', '一个尊重隐私、可再开发的元搜索引擎', 6);
INSERT INTO `t_engine` VALUES (29, 1, 'Google', 'https://g20.i-research.edu.eu.org/search?q=', '谷歌镜像搜索', 7);
INSERT INTO `t_engine` VALUES (30, 1, '360', 'https://www.so.com/s?q=', '360好搜', 8);
INSERT INTO `t_engine` VALUES (31, 1, '搜狗', 'https://www.sogou.com/web?query=', '搜狗搜索', 9);
INSERT INTO `t_engine` VALUES (32, 1, '神马', 'https://yz.m.sm.cn/s?q=', 'UC移动端搜索', 10);
INSERT INTO `t_engine` VALUES (33, 2, '大力盘', 'https://www.dalipan.com/#/main/search?keyword=', '捐赠会员制，老牌网盘资源聚合搜索', 1);
INSERT INTO `t_engine` VALUES (34, 2, '易搜', 'https://yiso.fun/info?searchKey=', '阿里百度夸克迅雷网盘资源搜索', 2);
INSERT INTO `t_engine` VALUES (35, 2, 'YouGit', 'https://yougit.net/search/?q=', '阿里、蓝奏网盘搜索', 3);
INSERT INTO `t_engine` VALUES (36, 2, '猫狸盘搜', 'https://www.alipansou.com/search?k=', '阿里云盘资源搜索', 4);
INSERT INTO `t_engine` VALUES (37, 2, 'UP云搜', 'https://www.upyunso.com/search.html?page=1&amp;keyword=', '阿里云盘资源搜索', 5);
INSERT INTO `t_engine` VALUES (38, 2, '天翼小站', 'https://yun.hei521.cn/index.php/search/', '天翼云盘资源搜索', 6);
INSERT INTO `t_engine` VALUES (39, 2, '乌鸦搜', 'https://www.wuyasou.com/search?keyword=', '百度夸克迅雷资源搜索', 7);
INSERT INTO `t_engine` VALUES (40, 2, 'fastso', 'https://www.fastsoso.cn/search?k=', '百度网盘资源搜索', 8);
INSERT INTO `t_engine` VALUES (41, 2, '千帆搜索', 'https://tg.qianfan.app/search/?q=', 'TG资源搜索', 9);
INSERT INTO `t_engine` VALUES (42, 3, '优惠券', 'https://www.2xb.cn/?r=/l&amp;kw=', '粘贴淘宝/京东/拼多多/唯品会商品标题查隐藏优惠券', 1);
INSERT INTO `t_engine` VALUES (43, 3, '比价网', 'http://www.b1bj.com/s.aspx?key=', '比价购物搜索', 2);
INSERT INTO `t_engine` VALUES (44, 3, '张大妈', 'https://search.smzdm.com/?&amp;s=', '什么值得买测评', 3);
INSERT INTO `t_engine` VALUES (45, 3, '快递100', 'http://www.kuaidi100.com/?', '输入单号，在1200+快递中查询', 4);
INSERT INTO `t_engine` VALUES (46, 3, '下厨房', 'http://www.xiachufang.com/search/?keyword=', '下厨房', 5);
INSERT INTO `t_engine` VALUES (47, 3, '香哈菜谱', 'https://www.xiangha.com/so/?q=caipu&amp;s=', '香哈菜谱', 6);
INSERT INTO `t_engine` VALUES (48, 3, '高德地图', 'https://ditu.amap.com/search?query=', '高德地图', 7);
INSERT INTO `t_engine` VALUES (49, 3, '去哪儿', 'https://www.qunar.com/?', '去哪儿', 8);
INSERT INTO `t_engine` VALUES (50, 4, '知乎', 'https://www.zhihu.com/search?type=content&amp;q=', '知乎', 1);
INSERT INTO `t_engine` VALUES (51, 4, '微信', 'http://weixin.sogou.com/weixin?type=2&amp;query=', '微信', 2);
INSERT INTO `t_engine` VALUES (52, 4, '微博', 'http://s.weibo.com/weibo/', '微博', 3);
INSERT INTO `t_engine` VALUES (53, 4, '豆瓣', 'https://www.douban.com/search?q=', '豆瓣', 4);
INSERT INTO `t_engine` VALUES (54, 4, '贴吧', 'https://tieba.baidu.com/f?kw=', '百度贴吧', 5);
INSERT INTO `t_engine` VALUES (55, 4, '简书', 'https://www.jianshu.com/search?q=', '简书', 6);
INSERT INTO `t_engine` VALUES (56, 4, '小红书', 'https://m.sogou.com/web/xiaohongshu?keyword=', '小红书', 7);
INSERT INTO `t_engine` VALUES (57, 4, 'CSDN', 'https://so.csdn.net/so/search?q=', 'CSDN', 8);
INSERT INTO `t_engine` VALUES (58, 4, '搜外问答', 'https://ask.seowhy.com/search/?q=', 'SEO问答社区', 9);
INSERT INTO `t_engine` VALUES (59, 5, 'B站', 'https://search.bilibili.com/all?keyword=', 'Bilibili搜索', 1);
INSERT INTO `t_engine` VALUES (60, 5, 'YYeTs', 'https://yyets.dmesg.app/search?keyword=', '人人影视分享站', 2);
INSERT INTO `t_engine` VALUES (61, 5, '茶杯狐', 'https://cupfox.app/s/', '茶杯狐影视聚合搜索', 3);
INSERT INTO `t_engine` VALUES (62, 5, '电影狗', 'https://www.dianyinggou.com/so/', '电影狗影视聚合搜索', 4);
INSERT INTO `t_engine` VALUES (63, 5, '音范丝', 'https://www.yinfans.me/?s=', '音范丝4K蓝光原盘', 5);
INSERT INTO `t_engine` VALUES (64, 5, 'CK部落', 'https://www.ck180.net/?s=', 'CK电影部落', 6);
INSERT INTO `t_engine` VALUES (65, 5, '鸭奈飞', 'https://yanetflix.com/vodsearch/-------------.html?wd=', '提供免费的奈飞影剧', 7);
INSERT INTO `t_engine` VALUES (66, 5, '小悠家', 'http://zyz.xiaouj.cn/?s=', '小悠家影视资源网盘分享', 8);
INSERT INTO `t_engine` VALUES (67, 5, '橘子盘搜', 'https://www.nmme.cc/s/1/', '影视资源网盘搜索', 9);
INSERT INTO `t_engine` VALUES (68, 6, '铜钟', 'https://tonzhon.com/search?keyword=', '输入音乐名称搜索下载', 1);
INSERT INTO `t_engine` VALUES (69, 6, 'MusicEnc', 'https://www.musicenc.com/?search=', '输入音乐名称搜索下载', 2);
INSERT INTO `t_engine` VALUES (70, 6, 'mp3-malina', 'https://mp3-banana.pro/tracks/', '输入音乐名称搜索下载', 3);
INSERT INTO `t_engine` VALUES (71, 6, '无名音乐', 'https://thewind.xyz/?keyword=', '输入音乐名称搜索下载', 4);
INSERT INTO `t_engine` VALUES (72, 6, 'MyFreeMp3', 'https://tool.liumingye.cn/music/?page=searchPage#/search/M/song/', '输入音乐名称搜索下载', 5);
INSERT INTO `t_engine` VALUES (73, 6, 'QQ', 'https://y.qq.com/n/ryqq/search?w=', 'QQ音乐', 6);
INSERT INTO `t_engine` VALUES (74, 6, '网易', 'https://music.163.com/#/search/m/?s=', '网易云音乐', 7);
INSERT INTO `t_engine` VALUES (75, 6, '酷狗', 'https://www.kugou.com/yy/html/search.html#searchType=song&amp;searchKeyWord=', '酷狗音乐', 8);
INSERT INTO `t_engine` VALUES (76, 7, 'Anna’s Archive', 'https://annas-archive.org/search?q=', 'Zlibrary镜像，输入书籍文献标题/作者，需魔法', 1);
INSERT INTO `t_engine` VALUES (77, 7, 'MyBookHouse', 'https://www.findbooks.info/index.php?u=search-index&amp;keyword=', '读秀书库秒链查询', 2);
INSERT INTO `t_engine` VALUES (78, 7, '找书网', 'https://findbooks.eu.org/index.php?ebook-search-keyword-', '读秀书库秒链查询', 3);
INSERT INTO `t_engine` VALUES (79, 7, 'PDFDrive', 'https://www.pdfdrive.com/search?q=', '8000多万册电子书，多为外文PDF', 4);
INSERT INTO `t_engine` VALUES (80, 7, '无名图书', 'https://www.book123.info/list?key=', '直接下载，界面清爽', 5);
INSERT INTO `t_engine` VALUES (81, 7, '图灵社区', 'https://www.ituring.com.cn/search/result?q=', '计算机、电子电气、数学统计、科普等，随书文件下载', 6);
INSERT INTO `t_engine` VALUES (82, 7, '备胎书屋', 'https://beitai.cc/', '精校网文电子书存档网站', 7);
INSERT INTO `t_engine` VALUES (83, 8, '百度', 'https://image.baidu.com/search/index?tn=baiduimage&amp;fm=result&amp;ie=utf-8&amp;word=', '百度图片', 1);
INSERT INTO `t_engine` VALUES (84, 8, '必应', 'https://cn.bing.com/images/search?q=', '必应图片', 2);
INSERT INTO `t_engine` VALUES (85, 8, '搜狗', 'http://pic.sogou.com/pics?query=', '搜狗图片', 3);
INSERT INTO `t_engine` VALUES (86, 8, '360', 'https://image.so.com/i?q=', '360图片', 4);
INSERT INTO `t_engine` VALUES (87, 8, '花瓣', 'https://huaban.com/search?q=', '花瓣图片素材搜索', 5);
INSERT INTO `t_engine` VALUES (88, 8, 'Pexels', 'https://www.pexels.com/zh-cn/search/', '免费无版权图片/视频搜索', 6);
INSERT INTO `t_engine` VALUES (89, 8, 'Unsplash', 'https://unsplash.com/s/photos/', '免费无版权图片', 7);
INSERT INTO `t_engine` VALUES (90, 8, '闪萌Gif', 'https://www.dbbqb.com/s?w=', '闪萌Gif动图搜索', 8);
INSERT INTO `t_engine` VALUES (91, 8, '表情包', 'https://www.dbbqb.com/s?w=', '表情包搜索', 9);
INSERT INTO `t_engine` VALUES (92, 8, 'iconfont', 'https://www.iconfont.cn/search/index?searchType=icon&amp;q=', '阿里巴巴矢量图标库', 10);
INSERT INTO `t_engine` VALUES (93, 9, '百度学术', 'https://xueshu.baidu.com/s?wd=', '百度学术搜索，可查询论文DOI', 1);
INSERT INTO `t_engine` VALUES (94, 9, '深度学术', 'https://xs.zidianzhan.net/scholar?hl=zh-CN&amp;as_sdt=0%2C5&amp;q=', '谷歌学术等多个学术数据源', 2);
INSERT INTO `t_engine` VALUES (95, 9, '熊猫学术', 'https://sc.panda321.com/scholar?hl=zh-cn&amp;q=', '谷歌学术等多个学术数据源', 3);
INSERT INTO `t_engine` VALUES (96, 9, '知网', 'https://kns.cnki.net/kns8/DefaultResult/Index?kw=', '知网学术搜索', 4);
INSERT INTO `t_engine` VALUES (97, 9, '万方', 'https://s.wanfangdata.com.cn/paper?q=', '万方学术搜索', 5);
INSERT INTO `t_engine` VALUES (98, 9, 'iData', 'https://search.cn-ki.net/search?keyword=', 'iData文献检索下载', 6);
INSERT INTO `t_engine` VALUES (99, 9, 'oaLib', 'https://www.oalib.com/search?type=0&amp;oldType=0&amp;kw=', '免费获取约五百七十万学术文章', 7);
INSERT INTO `t_engine` VALUES (100, 9, 'Sci-Hub', 'https://sci-hub.ee/', '输入论文DOI进行下载', 8);
INSERT INTO `t_engine` VALUES (101, 9, '学术图片', 'https://kns.cnki.net/kns8/DefaultResult/Index?kw=', 'CNKI学术图片库搜索', 9);
INSERT INTO `t_engine` VALUES (102, 10, '果核剥壳', 'https://www.ghxi.com/?s=', '输入软件类别或名称', 1);
INSERT INTO `t_engine` VALUES (103, 10, '大眼仔旭', 'http://www.dayanzai.me/?s=', '输入软件类别或名称', 2);
INSERT INTO `t_engine` VALUES (104, 10, '正版中国', 'https://www.getitfree.cn/search/', '正版软件限时免费', 3);
INSERT INTO `t_engine` VALUES (105, 10, 'Crx4', 'http://crx4.com/?s=', '浏览器插件下载', 4);
INSERT INTO `t_engine` VALUES (106, 10, 'MACYY', 'https://www.macyy.cn/?s=', 'Mac破解软件分享', 5);
INSERT INTO `t_engine` VALUES (107, 10, '星火社区', 'https://www.deepinos.org/?q=', 'Linux软件分享', 6);
INSERT INTO `t_engine` VALUES (108, 10, '盒子派', 'https://www.hezipie.com/?s=', '电视TV软件分享', 7);
INSERT INTO `t_engine` VALUES (109, 10, '应用汇', 'http://www.appchina.com/sou/?keyword=', '安卓手机应用分享', 8);
INSERT INTO `t_engine` VALUES (110, 11, 'Github', 'https://github.com/search?q=', 'Github搜索', 1);
INSERT INTO `t_engine` VALUES (111, 11, 'Gitee', 'https://search.gitee.com/?skin=rec&amp;type=repository&amp;q=', 'Gitee搜索', 2);
INSERT INTO `t_engine` VALUES (112, 11, 'ChinaZ', 'https://seo.chinaz.com/', '请输入网址(不带http://)', 3);
INSERT INTO `t_engine` VALUES (113, 11, '5118', 'https://seo.5118.com/', '请输入网址(不带http://)', 4);
INSERT INTO `t_engine` VALUES (114, 11, '备案查询', 'https://icp.chinaz.com/', '请输入网址(不带http://)', 5);
INSERT INTO `t_engine` VALUES (115, 11, '网站测速', 'https://www.boce.com/http/', '请输入网址(不带http://)', 6);
INSERT INTO `t_engine` VALUES (116, 11, 'IP查询', 'https://ip.chinaz.com/', '请输入IP地址', 7);
INSERT INTO `t_engine` VALUES (117, 11, 'ViewSource', 'https://neatnik.net/view-source/', '输入网址查看网页源代码', 8);

-- ----------------------------
-- Table structure for t_engine_class
-- ----------------------------
DROP TABLE IF EXISTS `t_engine_class`;
CREATE TABLE `t_engine_class`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NULL DEFAULT NULL,
  `orders` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf32 COLLATE = utf32_bin ROW_FORMAT = Redundant;

-- ----------------------------
-- Records of t_engine_class
-- ----------------------------
INSERT INTO `t_engine_class` VALUES (1, '搜索', 1);
INSERT INTO `t_engine_class` VALUES (2, '网盘', 2);
INSERT INTO `t_engine_class` VALUES (3, '生活', 3);
INSERT INTO `t_engine_class` VALUES (4, '社区', 4);
INSERT INTO `t_engine_class` VALUES (5, '影视', 5);
INSERT INTO `t_engine_class` VALUES (6, '音乐', 6);
INSERT INTO `t_engine_class` VALUES (7, '书籍', 7);
INSERT INTO `t_engine_class` VALUES (8, '图片', 8);
INSERT INTO `t_engine_class` VALUES (9, '学术', 9);
INSERT INTO `t_engine_class` VALUES (10, '软件', 10);
INSERT INTO `t_engine_class` VALUES (11, '开发', 11);

-- ----------------------------
-- Table structure for t_menu
-- ----------------------------
DROP TABLE IF EXISTS `t_menu`;
CREATE TABLE `t_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NULL DEFAULT NULL,
  `icon` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NULL DEFAULT NULL,
  `color` varchar(20) CHARACTER SET utf32 COLLATE utf32_bin NULL DEFAULT NULL,
  `is_nav` smallint(1) NULL DEFAULT 1,
  `orders` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf32 COLLATE = utf32_bin ROW_FORMAT = Redundant;

-- ----------------------------
-- Records of t_menu
-- ----------------------------
INSERT INTO `t_menu` VALUES (2, 'About', 'icon-cooperation-full', '#FFFFFF', NULL, 1);
INSERT INTO `t_menu` VALUES (3, '论坛社区', 'icon-luntan', '#cc7f72', 1, 2);
INSERT INTO `t_menu` VALUES (4, '存储传输', 'icon-yunchuanshu1', '#97c3f7', 1, 3);
INSERT INTO `t_menu` VALUES (5, '信息收发', 'icon-youxiang', '#6ac051', 1, 4);
INSERT INTO `t_menu` VALUES (6, '实用工具', 'icon-gongju-', '#7292ed', 1, 5);
INSERT INTO `t_menu` VALUES (7, '在线办公', 'icon-sucai1', '#4f869c', 1, 6);
INSERT INTO `t_menu` VALUES (8, '设计视觉', 'icon-sheji', '#ec5b93', 1, 7);
INSERT INTO `t_menu` VALUES (9, '系统软件', 'icon-a-ziyuan598', '#4877cb', 1, 8);
INSERT INTO `t_menu` VALUES (10, '学习教育', 'icon-xuexi-', '#82a2fe', 1, 9);
INSERT INTO `t_menu` VALUES (11, '书籍学术', 'icon-dushu3', '#f5ecce', 1, 10);
INSERT INTO `t_menu` VALUES (12, '影视媒体', 'icon-wenhuatiyuheyuleye', '#ea333d', 1, 11);
INSERT INTO `t_menu` VALUES (13, '音乐MV', 'icon-yinpin8', '#f9dc79', 1, 12);
INSERT INTO `t_menu` VALUES (14, '生活服务', 'icon-shenghuofuwu1', '#b2f6e4', 1, 13);
INSERT INTO `t_menu` VALUES (15, '品质购物', 'icon-icon-test', '#e39062', 1, 14);
INSERT INTO `t_menu` VALUES (16, '站长开发', 'icon-daimayuanpeizhi', '#c6c6c6', 1, 15);
INSERT INTO `t_menu` VALUES (17, '小组件', 'icon-xiaochengxu1', '#fff', 1, 16);

-- ----------------------------
-- Table structure for t_menu_item
-- ----------------------------
DROP TABLE IF EXISTS `t_menu_item`;
CREATE TABLE `t_menu_item`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `color` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `orders` int(255) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 200 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_menu_item
-- ----------------------------
INSERT INTO `t_menu_item` VALUES (1, 2, '个人博客', 'https://blog.lucki.top', 'icon-blog1', '#FF0033', 1);
INSERT INTO `t_menu_item` VALUES (2, 2, '个人主页', 'http://www.azad.asia/', 'icon-zhuye', '#FF9900', 2);
INSERT INTO `t_menu_item` VALUES (3, 2, '个人云盘', 'https://alist.azad.asia', 'icon-onedrive', '#2196f3', 3);
INSERT INTO `t_menu_item` VALUES (4, 2, '我的小店', 'https://faka.aihub.ren', 'icon-130', '#4b97f7', 4);
INSERT INTO `t_menu_item` VALUES (5, 2, '讨论区', 'https://support.qq.com/product/473691', 'icon-taolunqu', '#3e94ad', 5);
INSERT INTO `t_menu_item` VALUES (6, 2, '支持一下', 'http://www.azad.asia/dashang/', 'icon-kafeibeichabei', '#ffcd97', 6);
INSERT INTO `t_menu_item` VALUES (7, 3, '吾爱破解', 'https://www.52pojie.cn/', 'icon-hulianwang2', '#e52929', 0);
INSERT INTO `t_menu_item` VALUES (8, 3, '读书园地', 'https://readfree.net/bbs/forum.php/', 'icon-11', '#fe642e', 0);
INSERT INTO `t_menu_item` VALUES (9, 3, '十年之约', 'https://bbs.sn/', 'icon-blogger1', '#e8e8e8', 0);
INSERT INTO `t_menu_item` VALUES (10, 3, 'FreeMdict', 'https://forum.freemdict.com/', 'icon-F_square_solid', '#b3d9ff', 0);
INSERT INTO `t_menu_item` VALUES (11, 3, 'V2EX', 'https://www.v2ex.com/', 'icon-vex', '#2196f3', 0);
INSERT INTO `t_menu_item` VALUES (12, 3, 'CSDN', 'https://www.csdn.net/', 'icon-csdn', '#f03', 0);
INSERT INTO `t_menu_item` VALUES (13, 3, '微博', 'https://www.weibo.com', 'icon-weibo', '#e6162d', 0);
INSERT INTO `t_menu_item` VALUES (14, 3, '知乎', 'https://www.zhihu.com/', 'icon-zhihu', '#0084ff', 0);
INSERT INTO `t_menu_item` VALUES (15, 3, '豆瓣', 'https://www.douban.com/', 'icon-douban', '#072', 0);
INSERT INTO `t_menu_item` VALUES (16, 3, 'Instagram', 'https://www.instagram.com', 'icon-instagram', '#93009f', 0);
INSERT INTO `t_menu_item` VALUES (17, 3, 'Twitter', 'https://www.twitter.com', 'icon-tuite', '#00bcff', 0);
INSERT INTO `t_menu_item` VALUES (18, 3, 'Facebook', 'https://www.facebook.com', 'icon-facebook', '#4267b2', 0);
INSERT INTO `t_menu_item` VALUES (19, 4, '百度网盘', 'https://pan.baidu.com', 'icon-baiduyun', '#fcfefe', 0);
INSERT INTO `t_menu_item` VALUES (20, 4, '阿里云盘', 'https://www.aliyundrive.com/drive', 'icon-aliyun1', '#99a3f2', 0);
INSERT INTO `t_menu_item` VALUES (21, 4, '夸克网盘', 'https://pan.quark.cn/', 'icon--9', '#d2d2d2', 0);
INSERT INTO `t_menu_item` VALUES (22, 4, '123云盘', 'https://www.123pan.com/', 'icon-shuzhi', '#99a3f2', 0);
INSERT INTO `t_menu_item` VALUES (23, 4, 'OneDrive', 'https://stuscaueducn-my.sharepoint.com/', 'icon-microsoftonedrive', '#39889f', 0);
INSERT INTO `t_menu_item` VALUES (24, 4, '谷歌云盘', 'https://drive.google.com/?hl=zh_CN', 'icon-google-circle-fill', '#8ac5fc', 0);
INSERT INTO `t_menu_item` VALUES (25, 4, '115网盘', 'https://115.com/', 'icon-yunpanyunwenjian1', '#dacdfe', 0);
INSERT INTO `t_menu_item` VALUES (26, 4, '天翼云盘', 'https://cloud.189.cn/web/main/', 'icon-cloud1', '#58d3f7', 0);
INSERT INTO `t_menu_item` VALUES (27, 4, '和彩云盘', 'https://yun.139.com/', 'icon-aliyun2', '#fbfbfb', 0);
INSERT INTO `t_menu_item` VALUES (28, 4, '迅雷云盘', 'https://pan.xunlei.com/', 'icon-xunlei1193424easyiconnet', '#148bfe', 0);
INSERT INTO `t_menu_item` VALUES (29, 4, '蓝奏云', 'https://pc.woozooo.com/', 'icon-OneDrive', '#fcfcf0', 0);
INSERT INTO `t_menu_item` VALUES (30, 4, '腾讯微云', 'https://www.weiyun.com/', 'icon-tengxunyun', '#8eb2fa', 0);
INSERT INTO `t_menu_item` VALUES (31, 4, '坚果云', 'https://www.jianguoyun.com/', 'icon-jianguo', '#e1bf9b', 0);
INSERT INTO `t_menu_item` VALUES (32, 4, '文叔叔', 'https://www.wenshushu.cn/', 'icon-wenjianchuanshu1', '#cee3f6', 0);
INSERT INTO `t_menu_item` VALUES (33, 4, '奶牛快传', 'https://cowtransfer.com/', 'icon-wenjianchuanshu', '#f7f9a7', 0);
INSERT INTO `t_menu_item` VALUES (34, 5, 'QQ邮箱', 'https://mail.qq.com/', 'icon-QQ', '#f05', 0);
INSERT INTO `t_menu_item` VALUES (35, 5, '腾讯企业邮', 'https://exmail.qq.com/cgi-bin/login', 'icon-tengxunqiyeyouxiang', '#f05', 0);
INSERT INTO `t_menu_item` VALUES (36, 5, '网易邮箱', 'https://mail.163.com/', 'icon-wangyi', '#169', 0);
INSERT INTO `t_menu_item` VALUES (37, 5, '189邮箱', 'https://webmail30.189.cn/w2/index.html', 'icon-icon-email', '#4d4de9', 0);
INSERT INTO `t_menu_item` VALUES (38, 5, 'Outlook', 'https://outlook.live.com/mail/0/', 'icon-O_square_solid', '#3e94ad', 0);
INSERT INTO `t_menu_item` VALUES (39, 5, '88邮箱', 'https://www.88.com/#/', 'icon-mail', '#6f1dbc', 0);
INSERT INTO `t_menu_item` VALUES (40, 5, 'Gmail', 'https://mail.google.com/mail/u/0/#inbox', 'icon-google-circle-fill', '#f03', 0);
INSERT INTO `t_menu_item` VALUES (41, 5, '新浪邮箱', 'https://mail.sina.com.cn/', 'icon-tubiao214', '#e6162d', 0);
INSERT INTO `t_menu_item` VALUES (42, 5, '阿里邮箱', 'https://qiye.aliyun.com/', 'icon-alimailaliyouxiang', '#3461e5', 0);
INSERT INTO `t_menu_item` VALUES (43, 5, '临时邮箱', 'https://tempmail.cn/', 'icon-24gf-mailboxEmpty', '#198dff', 0);
INSERT INTO `t_menu_item` VALUES (44, 5, '短信接码', 'https://smsjisu.com/', 'icon-email-fill', '#1dbc1d', 0);
INSERT INTO `t_menu_item` VALUES (45, 5, '阅后即焚', 'https://sesme.co/', 'icon-wenjianleixing-biaozhuntu-lianjie', '#b6b6b6', 0);
INSERT INTO `t_menu_item` VALUES (46, 6, 'Sssbar', 'https://bar.ssstab.com/', 'icon-S_square_solid', '#ec625c', 0);
INSERT INTO `t_menu_item` VALUES (47, 6, '腾讯帮小忙', 'https://tool.browser.qq.com/', 'icon-xuanzhuan', '#6993f4', 0);
INSERT INTO `t_menu_item` VALUES (48, 6, 'Miku工具', 'https://miku.tools/', 'icon-gongjuxiang ', '#bcdefd', 0);
INSERT INTO `t_menu_item` VALUES (49, 6, '123APPS', 'https://123apps.com/cn/', 'icon-Drive-Folder', '#ffcc33', 0);
INSERT INTO `t_menu_item` VALUES (50, 6, '独特工具箱', 'https://www.dute.org/', 'icon-icongongju', '#0f89c2', 0);
INSERT INTO `t_menu_item` VALUES (51, 6, '即时工具', 'https://www.67tool.com/', 'icon-js', '#1a82e2', 0);
INSERT INTO `t_menu_item` VALUES (52, 6, '在线工具', 'https://tool.lu/', 'icon-gongjuxiang1', '#9af2b0', 0);
INSERT INTO `t_menu_item` VALUES (53, 6, '网易见外', 'https://jianwai.youdao.com/index/0', 'icon--5', '#55bbed', 0);
INSERT INTO `t_menu_item` VALUES (54, 6, '易转换', 'https://www.easeconvert.com/', 'icon-zhuanhuan2', '#ec5959', 0);
INSERT INTO `t_menu_item` VALUES (55, 6, 'ALLtoALL', 'https://www.alltoall.net/', 'icon-zhuanhuan3', '#ed6f67', 0);
INSERT INTO `t_menu_item` VALUES (56, 6, 'docsmall', 'https://docsmall.com/', 'icon-gongzuotai4', '#8e8e8e', 0);
INSERT INTO `t_menu_item` VALUES (57, 6, 'LALAL音频', 'https://www.lalal.ai/zh-hans/', 'icon-jianzhuanquan-', '#fafe82', 0);
INSERT INTO `t_menu_item` VALUES (58, 6, '十行笔记', 'https://videoai.perspectivar.com/', 'icon-windmill', '#f6c675', 0);
INSERT INTO `t_menu_item` VALUES (59, 6, '文件加密', 'https://www.dogged.cn/', 'icon-gou3', '#6226f5', 0);
INSERT INTO `t_menu_item` VALUES (60, 6, '短链生成', 'https://xiaomark.com/', 'icon-lianjie2', '#eb5669', 0);
INSERT INTO `t_menu_item` VALUES (61, 6, '老王图床', 'https://img.gejiba.com/', 'icon-tupian19', '#9966de', 0);
INSERT INTO `t_menu_item` VALUES (62, 6, '路过图床', 'https://imgse.com/', 'icon-tupian20', '#d97a6e', 0);
INSERT INTO `t_menu_item` VALUES (63, 6, '视频床', 'https://thumbsnap.com/', 'icon-shipinshangchuan', '#3b86f2', 0);
INSERT INTO `t_menu_item` VALUES (64, 7, 'WPS写作', 'https://aiwrite.wps.cn/#/', 'icon-microsoftazure', '#ee8245', 0);
INSERT INTO `t_menu_item` VALUES (65, 7, '秘塔写作猫', 'https://aiwrite.wps.cn/#/', 'icon-AI', '#5f76ca', 0);
INSERT INTO `t_menu_item` VALUES (66, 7, 'Effidit', 'https://effidit.qq.com/demo', 'icon-yumaobi', '#3e7af7', 0);
INSERT INTO `t_menu_item` VALUES (67, 7, '有道云笔记', 'https://note.youdao.com/web/', 'icon-youdaoyunbiji', '#6588f6', 0);
INSERT INTO `t_menu_item` VALUES (68, 7, '语雀', 'https://www.yuque.com/', 'icon-yuque-fill', '#8cd881', 0);
INSERT INTO `t_menu_item` VALUES (69, 7, 'FlowUs', 'https://flowus.cn/product', 'icon-F_round_solid', '#f6c645', 0);
INSERT INTO `t_menu_item` VALUES (70, 7, 'Office365', 'https://www.office.com/', 'icon-microsoftoffice', '#e29436', 0);
INSERT INTO `t_menu_item` VALUES (71, 7, 'SeaTable', 'https://seatable.cn/', 'icon-shujutubiao', '#ef8733', 0);
INSERT INTO `t_menu_item` VALUES (72, 7, '稻壳儿', 'https://www.docer.com/', 'icon-material1', '#ea423e', 0);
INSERT INTO `t_menu_item` VALUES (73, 7, 'OfficePLUS', 'https://www.officeplus.cn/', 'icon-pageOffice', '#a6cbfa', 0);
INSERT INTO `t_menu_item` VALUES (74, 7, '合同文本库', 'https://cont.12315.cn/', 'icon-gejizhengfu', '#d04b34', 0);
INSERT INTO `t_menu_item` VALUES (75, 7, '腾讯问卷', 'https://wj.qq.com/index.html', 'icon-guanlirenzheng', '#3d76f6', 0);
INSERT INTO `t_menu_item` VALUES (76, 7, '极简简历', 'https://www.polebrief.com/index/', 'icon-toujianli', '#e8eaec', 0);
INSERT INTO `t_menu_item` VALUES (77, 7, 'Deepl翻译', 'https://www.deepl.com/translator/', 'icon-lianjie', '#455569', 0);
INSERT INTO `t_menu_item` VALUES (78, 8, 'Dribbble', 'https://www.dribbble.com/', 'icon-diqiu1', '#d85888', 0);
INSERT INTO `t_menu_item` VALUES (79, 8, '奇迹秀', ' https://www.qijishow.com/', 'icon-sheji1', '#8efbb2', 0);
INSERT INTO `t_menu_item` VALUES (80, 8, '奇迹秀工具', 'https://www.qijishow.com/down/index.html', 'icon-codepen-circle-fill', '#f2f2f2', 0);
INSERT INTO `t_menu_item` VALUES (81, 8, 'ARC实验室', 'https://arc.tencent.com/zh/ai-demos/faceRestoration', 'icon-16gl-A', '#416ccc', 0);
INSERT INTO `t_menu_item` VALUES (82, 8, '佐糖', 'https://picwish.cn/', 'icon-tuwenxiangqing', '#6db1f8', 0);
INSERT INTO `t_menu_item` VALUES (83, 8, '标小智', 'https://www.logosc.cn/design/', 'icon-hulianwang3', '#49a2f6', 0);
INSERT INTO `t_menu_item` VALUES (84, 8, '在线PS', 'https://www.uupoop.com/#/', 'icon-16gl-P', '#6299e1', 0);
INSERT INTO `t_menu_item` VALUES (85, 8, '稿定设计', 'https://www.gaoding.com/', 'icon-G_square_solid', '#2f53eb', 0);
INSERT INTO `t_menu_item` VALUES (86, 8, '可画Canva', 'https://www.canva.cn/', 'icon-C_round_solid', '#4784d5', 0);
INSERT INTO `t_menu_item` VALUES (87, 8, '站酷', 'https://www.zcool.com.cn/', 'icon-16gl-Z', '#f90', 0);
INSERT INTO `t_menu_item` VALUES (88, 8, '优设', 'https://www.uisdc.com/', 'icon-youshewang', '#0aa', 0);
INSERT INTO `t_menu_item` VALUES (89, 8, 'UI中国', 'https://ui.cn/', 'icon-UIzhonggu', '#FFF', 0);
INSERT INTO `t_menu_item` VALUES (90, 8, 'IconFinder', 'https://www.iconfinder.com/', 'icon-ey', '#FFF', 0);
INSERT INTO `t_menu_item` VALUES (91, 8, '阿里图标', 'https://www.iconfont.cn/', 'icon-shouyezhaosucai', '#ff6019', 0);
INSERT INTO `t_menu_item` VALUES (92, 8, '花瓣', 'https://huaban.com/', 'icon-huabanwang', '#ff4d94', 0);
INSERT INTO `t_menu_item` VALUES (93, 8, '天空之城', 'https://www.skypixel.com/', 'icon-16gl-S', '#969696', 0);
INSERT INTO `t_menu_item` VALUES (94, 8, '文心一格', 'https://yige.baidu.com/#/', 'icon-ai', '#282fd6', 0);
INSERT INTO `t_menu_item` VALUES (95, 8, '中国色', 'http://zhongguose.com/', 'icon-sketchpad-theme-full', '#e9c1d0', 0);
INSERT INTO `t_menu_item` VALUES (96, 8, '炫酷配色', 'https://www.coocolors.com/browseGradient', 'icon-yanse', '#5a9cf8', 0);
INSERT INTO `t_menu_item` VALUES (97, 8, '求字体', 'https://www.qiuziti.com/', 'icon-zitishezhi-shuangse', '#60d0b2', 0);
INSERT INTO `t_menu_item` VALUES (98, 8, '必应壁纸', 'https://www.todaybing.com/', 'icon-tupian7', '#7991f3', 0);
INSERT INTO `t_menu_item` VALUES (99, 9, 'Microsoft', 'https://www.microsoft.com/zh-cn/windows/?r=1', 'icon-logo-windows', '#3679d1', 0);
INSERT INTO `t_menu_item` VALUES (100, 9, 'TechBench', 'https://tb.rg-adguard.net/public.php/', 'icon-windows', '#575756', 0);
INSERT INTO `t_menu_item` VALUES (101, 9, 'MSDN', 'https://store.rg-adguard.net/', 'icon-windows', '#48c', 0);
INSERT INTO `t_menu_item` VALUES (102, 9, '微软商店', 'https://msdn.itellyou.cn/', 'icon-windows5', '#ffffff', 0);
INSERT INTO `t_menu_item` VALUES (103, 9, 'OfficeTool', 'https://otp.landian.vip/zh-cn/', 'icon-16gl-O', '#558fc3', 0);
INSERT INTO `t_menu_item` VALUES (104, 9, '软仓', 'https://www.ruancang.net/#/sim', 'icon-jichuruanjian', '#a4a4a4', 0);
INSERT INTO `t_menu_item` VALUES (105, 9, '老弟工具', 'https://ldtstore.com.cn/ldtools/', 'icon-diannaoruanjian', '#f2f2f2', 0);
INSERT INTO `t_menu_item` VALUES (106, 9, '小众软件', 'https://meta.appinn.net/', 'icon-Water', '#2c67d4', 0);
INSERT INTO `t_menu_item` VALUES (107, 9, '爱好论坛', 'https://www.aihao.cc/forum.php/', 'icon-Ai', '#dba260', 0);
INSERT INTO `t_menu_item` VALUES (108, 9, '极简插件', 'https://chrome.zzzmh.cn/index#/index', 'icon-extend', '#fbf6e5', 0);
INSERT INTO `t_menu_item` VALUES (109, 9, '腾讯哈勃', 'https://habo.qq.com/', 'icon-circulation', '#5c8cdb', 0);
INSERT INTO `t_menu_item` VALUES (110, 10, '国家中小学', 'https://www.zxx.edu.cn/', 'icon-ziyuan3', '#3261e4', 0);
INSERT INTO `t_menu_item` VALUES (111, 10, '国家教育资', 'https://so.eduyun.cn/synResource', 'icon-xuexizhongxin', '#579399', 0);
INSERT INTO `t_menu_item` VALUES (112, 10, '国图公开课', 'http://open.nlc.cn/onlineedu/client/index.htm', 'icon-zhengfujianguan', '#30626e', 0);
INSERT INTO `t_menu_item` VALUES (113, 10, '腾讯课堂', 'https://ke.qq.com/', 'icon-study-fill', '#3f7eef', 0);
INSERT INTO `t_menu_item` VALUES (114, 10, '网易云课堂', 'https://study.163.com/', 'icon-dushu2', '#e43d38', 0);
INSERT INTO `t_menu_item` VALUES (115, 10, '网易公开课', 'https://open.163.com/', 'icon-shipin10', '#6e8c77', 0);
INSERT INTO `t_menu_item` VALUES (116, 10, '学堂在线', 'https://www.cctalk.com/', 'icon-1', '#5d8ceb', 0);
INSERT INTO `t_menu_item` VALUES (117, 10, '慕课网', 'https://www.imooc.com/', 'icon-fire3', '#d55251', 0);
INSERT INTO `t_menu_item` VALUES (118, 10, '智慧树', 'https://www.zhihuishu.com/', 'icon-shengboyuyinxiaoxi', '#7caf5f', 0);
INSERT INTO `t_menu_item` VALUES (119, 10, 'CCtalk', 'https://www.cctalk.com/', 'icon-copyright', '#448ade', 0);
INSERT INTO `t_menu_item` VALUES (120, 10, '巧匠课堂', 'https://www.2qj.com/', 'icon-UIsheji', '#f09237', 0);
INSERT INTO `t_menu_item` VALUES (121, 10, '菜鸟教程', 'https://www.runoob.com/', 'icon-daimayuanpeizhi', '#9dc762', 0);
INSERT INTO `t_menu_item` VALUES (122, 10, '研线网', 'http://www.yanxian.org/', 'icon-xuexiquan', '#58af8e', 0);
INSERT INTO `t_menu_item` VALUES (123, 10, '考研真题', 'https://kaoyan.eol.cn/', 'icon-kaoshi', '#b9361b', 0);
INSERT INTO `t_menu_item` VALUES (124, 10, '金榜题名', 'http://qzbltushu.ysepan.com/', 'icon-hulianwang1', '#fff', 0);
INSERT INTO `t_menu_item` VALUES (125, 10, '考公网盘', 'http://gongkao6688.edudisk.cn/', 'icon-hulianwang1', '#fff', 0);
INSERT INTO `t_menu_item` VALUES (126, 11, '巴别图书馆', 'http://book.azad.asia/', 'icon-tushuguan', '#f19e3d', 0);
INSERT INTO `t_menu_item` VALUES (127, 11, '科塔学术', 'https://site.sciping.com/', 'icon-xueshuziliao', '#396b9e', 0);
INSERT INTO `t_menu_item` VALUES (128, 11, '图书馆联盟', 'http://www.ucdrs.superlib.net/', 'icon-liulanqi-IE', '#509fe7', 0);
INSERT INTO `t_menu_item` VALUES (129, 11, '超星汇雅', 'https://www.sslibrary.com/', 'icon-diqi', '#FFF', 0);
INSERT INTO `t_menu_item` VALUES (130, 11, '谷歌镜像01', 'https://so.hiqq.com.cn/', 'icon-google ', '#5383ec', 0);
INSERT INTO `t_menu_item` VALUES (131, 11, '谷歌镜像02', 'https://google.aihub.ren', 'icon-google ', '#5383ec', 0);
INSERT INTO `t_menu_item` VALUES (132, 11, '维基百科01', 'https://zh.wikipedia.njau.cf/', 'icon-16gl-W', '#FFF', 0);
INSERT INTO `t_menu_item` VALUES (133, 11, '维基百科02', 'https://www.wikipedia.aust.cf/', 'icon-16gl-W', '#FFF', 0);
INSERT INTO `t_menu_item` VALUES (134, 12, 'CCTV', 'https://tv.cctv.com/index.shtml', 'icon-16gl-C', '#f03', 0);
INSERT INTO `t_menu_item` VALUES (135, 12, '腾讯视频', 'https://v.qq.com/', 'icon-tengxunshipin', '#2a0', 0);
INSERT INTO `t_menu_item` VALUES (136, 12, '优酷', 'https://www.youku.com/', 'icon-youku', '#09e', 0);
INSERT INTO `t_menu_item` VALUES (137, 12, '爱奇艺', 'https://www.iqiyi.com/', 'icon-aiqiyi', '#1d0', 0);
INSERT INTO `t_menu_item` VALUES (138, 12, '人人影视', 'https://www.yysub.net/', 'icon-renren1', '#067', 0);
INSERT INTO `t_menu_item` VALUES (139, 12, 'ACFUN', 'http://www.acfun.cn/index.html', 'icon-acfun', '#f33', 0);
INSERT INTO `t_menu_item` VALUES (140, 12, 'Youtube', 'https://www.youtube.com/', 'icon-youtube', '#f03', 0);
INSERT INTO `t_menu_item` VALUES (141, 12, '哔哩哔哩', 'https://www.bilibili.com/', 'icon-icon_bilibili-circle', '#09e', 0);
INSERT INTO `t_menu_item` VALUES (142, 12, '快手', 'https://www.kuaishou.com/', 'icon-kuaishou', '#fe5858', 0);
INSERT INTO `t_menu_item` VALUES (143, 12, '抖音', 'https://www.douyin.com/', 'icon-douyin', '#756969', 0);
INSERT INTO `t_menu_item` VALUES (144, 12, '影视森林', 'https://www.549.tv/', 'icon-yingshi7', '#da4f56', 0);
INSERT INTO `t_menu_item` VALUES (145, 13, '洛雪音乐', 'https://github.com/lyswhut/lx-music-desktop/', 'icon-yinle', '#cef6ce', 0);
INSERT INTO `t_menu_item` VALUES (146, 13, 'Listen1', 'https://listen1.github.io/listen1/', 'icon-L_square_solid', '#cecdd1', 0);
INSERT INTO `t_menu_item` VALUES (147, 13, 'Audiomack', 'https://audiomack.com/', 'icon-dyvmsyuyinfuwu', '#df7c2f', 0);
INSERT INTO `t_menu_item` VALUES (148, 13, 'HiFiNi社区', 'https://hifini.com/', 'icon-yinpinfuwu', '#ffcc33', 0);
INSERT INTO `t_menu_item` VALUES (149, 13, '炫音论坛', 'https://bbs.musicool.cn/', 'icon-yinle1', '#486bd1', 0);
INSERT INTO `t_menu_item` VALUES (150, 13, '熊猫无损', 'https://www.xmwav.com/', 'icon-daxiongmao-01', '#fbfbfb', 0);
INSERT INTO `t_menu_item` VALUES (151, 13, 'MP3BST', 'https://mp3bst.com/#', 'icon-yinpin5', '#ef8432', 0);
INSERT INTO `t_menu_item` VALUES (152, 13, '蓝光演唱会', 'https://www.lgych.com/', 'icon-24gf-musicAlbum', '#3579f6', 0);
INSERT INTO `t_menu_item` VALUES (153, 13, 'FUGUE', 'https://igoutu.cn/music', 'icon-F_square_solid', '#f8d57f', 0);
INSERT INTO `t_menu_item` VALUES (154, 13, '漫音社', 'http://www.acgjc.com/', 'icon-xin-yinfu', '#ed6a5b', 0);
INSERT INTO `t_menu_item` VALUES (155, 13, '云听', 'https://www.radio.cn/pc-portal/home/index.html', 'icon-aliyun', '#c42920', 0);
INSERT INTO `t_menu_item` VALUES (156, 13, '喜马拉雅', 'https://www.ximalaya.com/', 'icon-fm', '#eb562e', 0);
INSERT INTO `t_menu_item` VALUES (157, 13, '豆瓣FM', 'https://fm.douban.com/', 'icon-yinpin6', '#ead6a3', 0);
INSERT INTO `t_menu_item` VALUES (158, 13, '音悦台', 'https://www.yinyuetai.com/', 'icon-yinpin', '#8ea642', 0);
INSERT INTO `t_menu_item` VALUES (159, 13, '网易云', 'https://music.163.com/', 'icon-wangyiyunyinyuemusic1193417easyiconnet', '#cb2b29', 0);
INSERT INTO `t_menu_item` VALUES (160, 13, 'QQ音乐', 'https://y.qq.com/', 'icon-yinlegedanyinfu', '#e9ffab', 0);
INSERT INTO `t_menu_item` VALUES (161, 13, '酷我音乐', 'http://www.kuwo.cn/', 'icon-kugou', '#ed6b2c', 0);
INSERT INTO `t_menu_item` VALUES (162, 14, '生活计算器', 'https://www.chengxua.com/38', 'icon-V', '#e9754d', 0);
INSERT INTO `t_menu_item` VALUES (163, 14, '个税计算', 'https://hizdm.cn/', 'icon-jiaofei2', '#61b278', 0);
INSERT INTO `t_menu_item` VALUES (164, 14, '薪酬计算', 'https://www.xinchou.com/', 'icon-jiaofei3', '#fae59b', 0);
INSERT INTO `t_menu_item` VALUES (165, 14, '豆果美食', 'https://www.douguo.com/', 'icon-yinshi1', '#fff9e6', 0);
INSERT INTO `t_menu_item` VALUES (166, 14, '房天下', 'https://www.fang.com/', 'icon-zhusu1', '#ef8b34', 0);
INSERT INTO `t_menu_item` VALUES (167, 14, '美团网', 'https://www.meituan.com/changecity/', 'icon-meituan', '#f6ca48', 0);
INSERT INTO `t_menu_item` VALUES (168, 14, '大众点评', 'https://www.dianping.com/', 'icon-dazhongdianping', '#dc6e46', 0);
INSERT INTO `t_menu_item` VALUES (169, 14, '12306', 'https://www.12306.cn/index/', 'icon-icon-12306', '#ea4025', 0);
INSERT INTO `t_menu_item` VALUES (170, 14, '携程旅行', 'https://www.ctrip.com/', 'icon-xiecheng', '#3e75dc', 0);
INSERT INTO `t_menu_item` VALUES (171, 14, '飞猪旅行', 'https://www.fliggy.com/', 'icon-chalvchuhang', '#f5c552', 0);
INSERT INTO `t_menu_item` VALUES (172, 14, '马蜂窝', 'https://www.mafengwo.cn/', 'icon-mifeng1', '#f8d247', 0);
INSERT INTO `t_menu_item` VALUES (173, 15, '淘宝', 'https://www.taobao.com/', 'icon-taobao1', '#f18b58', 0);
INSERT INTO `t_menu_item` VALUES (174, 15, '京东', 'https://www.jd.com/', 'icon-jingdong_', '#b72d2c', 0);
INSERT INTO `t_menu_item` VALUES (175, 15, '拼多多', 'http://mobile.pinduoduo.com/', 'icon-pinduoduo', '#e34c4c', 0);
INSERT INTO `t_menu_item` VALUES (176, 15, '亚马逊', 'https://www.amazon.cn/', 'icon-amazon', '#eba339', 0);
INSERT INTO `t_menu_item` VALUES (177, 15, '天猫', 'https://www.tmall.com/', 'icon-tianmaologo2', '#ea3339', 0);
INSERT INTO `t_menu_item` VALUES (178, 15, '淘特', 'https://temai.taobao.com/', 'icon-taobao', '#f18b58', 0);
INSERT INTO `t_menu_item` VALUES (179, 15, '苏宁易购', 'https://www.suning.com/', 'icon-suningyigou-', '#f3ae3d', 0);
INSERT INTO `t_menu_item` VALUES (180, 15, '当当', 'http://www.dangdang.com/', 'icon-dangdang1193377easyiconnet', '#ed5a4b', 0);
INSERT INTO `t_menu_item` VALUES (181, 15, '孔夫子', 'https://www.kongfz.com/index.php', 'icon-shu1', '#9a5559', 0);
INSERT INTO `t_menu_item` VALUES (182, 15, '历史价格', 'http://www.xitie.com/', 'icon-qianfeijiaofei', '#ebbf9b', 0);
INSERT INTO `t_menu_item` VALUES (183, 16, '腾讯云', 'https://console.cloud.tencent.com/', 'icon-tengxunyun1', '#48a1f8', 0);
INSERT INTO `t_menu_item` VALUES (184, 16, '阿里云', 'https://home.console.aliyun.com/', 'icon-alibabacloud', '#ed732e', 0);
INSERT INTO `t_menu_item` VALUES (185, 16, 'W3school', 'http://www.w3school.com.cn/', 'icon-html2', '#c03', 0);
INSERT INTO `t_menu_item` VALUES (186, 16, 'Github', 'https://github.com/', 'icon-githu', '#FFF', 0);
INSERT INTO `t_menu_item` VALUES (187, 16, 'Gitee', 'https://gitee.com/', 'icon-gitee-fill-round', '#c55a57', 0);
INSERT INTO `t_menu_item` VALUES (188, 16, 'Codepen', 'https://codepen.io/', 'icon-codepe', '#FFF', 0);
INSERT INTO `t_menu_item` VALUES (189, 16, 'SF思否', 'https://segmentfault.com/', 'icon-jiaohu-', '#096', 0);
INSERT INTO `t_menu_item` VALUES (190, 16, 'CdnJs', 'https://cdnjs.com/', 'icon-cdnjs', '#e52', 0);
INSERT INTO `t_menu_item` VALUES (191, 16, 'Font A.', 'https://fontawesome.com/icons?d=gallery&amp;m=free', 'icon-qizhi', '#608cd1', 0);
INSERT INTO `t_menu_item` VALUES (192, 16, 'CFcdn', 'https://dash.cloudflare.com/', 'icon-yunfuwuqi6', '#f37f20', 0);
INSERT INTO `t_menu_item` VALUES (193, 16, 'Swiper', 'https://www.swiper.com.cn/', 'icon-S_round_solid', '#5d35ed', 0);
INSERT INTO `t_menu_item` VALUES (194, 16, 'PHP中文网', 'https://www.php.cn/', 'icon-php', '#e13121', 0);
INSERT INTO `t_menu_item` VALUES (195, 16, '菜鸟工具', 'https://c.runoob.com/', 'icon-daima1', '#ed6f51', 0);
INSERT INTO `t_menu_item` VALUES (196, 16, '脚本之家', 'http://tools.jb51.net/', 'icon-java1', '#a46455', 0);

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES (1, 'admin', '123456', '管理员', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for t_widget
-- ----------------------------
DROP TABLE IF EXISTS `t_widget`;
CREATE TABLE `t_widget`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'page/menu',
  `menu_id` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_widget
-- ----------------------------
INSERT INTO `t_widget` VALUES (1, 'menu', 17, '日历', '<iframe width=\"104%\" height=\"400\" src=\"https://cn.widgetstore.net/view/index.html?q=6d85a2b962b061540bb1fda124154382.5acccc6863bed97a0082344661d57a18\" scrolling=\"no\" border=\"0\" frameborder=\"0\" framespacing=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\"></iframe>', '时钟小组件，通过组件世界制作：https://cn.widgetstore.net/#/home');
INSERT INTO `t_widget` VALUES (2, 'menu', 17, '时钟', '<iframe width=\"100%\" height=\"320\" src=\"./clock/\" scrolling=\"no\" border=\"0\" frameborder=\"0\" framespacing=\"0\" allowfullscreen=\"true\"></iframe>', '时钟小组件\n（代码直接复制的 https://ss.azad.asia/ Azad大佬的，大家去围观一下）');
INSERT INTO `t_widget` VALUES (3, 'page', 2, '和风天气插件', '<div id=\"he-plugin-simple\"></div>\n<script>\nWIDGET = {\"CONFIG\":{\"modules\":\"02\",\"background\":\"5\",\"tmpColor\":\"FFFFFF\",\"tmpSize\":\"18\",\"cityColor\":\"FFFFFF\",\"citySize\":\"16\",\"aqiColor\":\"FFFFFF\",\"aqiSize\":\"16\",\"weatherIconSize\":\"26\",\"alertIconSize\":\"18\",\"padding\":\"10px 10px 10px 10px\",\"shadow\":\"0\",\"language\":\"auto\",\"fixed\":\"true\",\"vertical\":\"right\",\"horizontal\":\"left\",\"left\":\"8\",\"top\":\"8\",\"key\":\"2876fc0106824630b9dcce28706f1b03\"}}\n</script>\n<script src=\"https://widget.qweather.net/simple/static/js/he-simple-common.js?v=2.0\"></script>', '和风天气插件：https://widget.qweather.com/create-simple\n\n网页左上角，展示和风天气\n条件可以的，自己去官网申请一下key，反正是免费的，就是一个key每日使用次数有限~');
INSERT INTO `t_widget` VALUES (4, 'page', 2, '明月浩空音乐播放器', '<script id=\"myhk\" src=\"https://myhkw.cn/api/player/1691082472172\" key=\"1691082472172\"></script>', '明月浩空音乐播放器：https://myhkw.cn/\n展示不出来是因为我限制了域名，可以去官网注册一个，免费的~');
INSERT INTO `t_widget` VALUES (5, 'page', 2, 'Hitokoto 一言', '<style>\n      p#hitokoto_text {\n            width: auto;\n            display: none;\n      }\n\n      p#hitokoto_text::before {\n            content: \'『\';\n            padding: 0 6px;\n      }\n\n      p#hitokoto_text::after {\n            content: \'』\';\n            padding: 0 6px;\n      }\n</style>\n<script>\n      async function fetchHitokoto() {\n            const response = await fetch(\'https://v1.hitokoto.cn\')\n            const {\n                  uuid,\n                  hitokoto: hitokotoText\n            } = await response.json()\n            const hitokoto = document.querySelector(\'#hitokoto_text\')\n            hitokoto.style.display = \'inline-block\'\n            const hitokotoTexts = hitokotoText.split(\'\')\n            displayHitokoto()\n\n            function displayHitokoto() {\n                  if (0 == hitokotoTexts.length) return\n                  setTimeout(() => {\n                        hitokoto.innerText += hitokotoTexts.shift()\n                        displayHitokoto()\n                  }, 50)\n            }\n      }\n      // 创建一言文本容器\n      const hitokoto = document.createElement(\"p\");\n      hitokoto.id = \"hitokoto_text\";\n      const copyright = document.getElementById(\"copyright\");\n      document.querySelector(\"footer#footer\").insertBefore(hitokoto, copyright);\n      // 执行方法\n      fetchHitokoto()\n</script>', '一言：https://hitokoto.cn/#\n\n在网站底部#footer标签前，插入一言文本，动态展示。');

SET FOREIGN_KEY_CHECKS = 1;
