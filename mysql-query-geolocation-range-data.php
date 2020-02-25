<!-- CORE QUERY 1-->

SELECT `pp`.`city_name`, `pp`.`location_lat`, `pp`.`location_lng`, `c`.`cid`, `pp`.`category_id`, `pp`.`ppid`,
`ppa`.`package_pid`, `pp`.`user_id`, `vbi`.`vendor_id`, `vbi`.`purchase_package_id`, `vbh`.`package_pid`,
`pp`.`payment_status`, `pp`.`expire_date`, `vbh`.`day_name`, `ppa`.`service_expire_date`,
`ppa`.`visible_on_screen_name`, 111.1111*DEGREES(acos( cos( radians(28.6280613) ) * cos( radians( pp.location_lat ) ) *
cos( radians( 77.376227 ) - radians(pp.location_lng) ) + sin( radians(28.6280613) ) * sin( radians(pp.location_lat ) ) )
) as from_distance
FROM `purchase_package` as `pp`
LEFT JOIN `categories` as `c` ON `c`.`cid` = `pp`.`category_id`
JOIN `post_paid_ad` as `ppa` ON `pp`.`ppid` = `ppa`.`package_pid`
JOIN `vendor_business_information` as `vbi` ON `pp`.`user_id` = `vbi`.`vendor_id` and `pp`.`ppid` =
`vbi`.`purchase_package_id`
LEFT JOIN `vendor_business_hours` as `vbh` ON `pp`.`ppid` = `vbh`.`package_pid`
WHERE `pp`.`expire_date` >= '2020-01-15'
AND `pp`.`user_id` NOT IN('')
AND `pp`.`payment_status` = '2'
AND `vbh`.`day_name` = 'Wednesday'
AND `ppa`.`visible_on_screen_name` = 'home'
AND `ppa`.`service_expire_date` >= '2020-01-15'
HAVING `pp`.`city_name` = 'all_city' OR `pp`.`city_name` = 'Noida' OR `from_distance` <= '6000'
