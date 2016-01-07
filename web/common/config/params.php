<?php
return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    //节点角色
    'noderole' => ['0' => "种植户、养殖户", '1' => "加工企业", '2' => "检疫检验", '3' => "运输保存", '4' => "批发销售"],
    //动态的类别
    'classify' => ['食品原料' => ['种源', '饲养、种植', '饲料、肥料', '病史', '迁移、移植'], '原料初加工' => ['检验检疫', '屠宰、采收', '清洗、预冷', '杀菌、消毒', '分割、包装', '生成人员、设备'], '物流' => ['质量检验', '温度监控', '仓储', '运输、配送'], '食品生产' => ['生产加工工序', '生产作业参数', '质量检验', '加工、出产时刻', '', '生产人员、设备', '包装、编号'], '食品销售' => ['质量检验', '进货时间', '销售时间', '环境卫生', '供应、销售渠道']],
	//证件类别
	'certificate' => ['0' => "身份证", '1' => "驾驶证", '2' => '营业执照'],
];
