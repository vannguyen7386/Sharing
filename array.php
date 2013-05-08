<table border="1">
    <tr>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
        <th>Sunday</th>
    </tr>
    <?php
    echo "adsad";
    $arr_datas = array(array(date => '2013-02-23', price => 200, is_campaign => 1),
        array(date => '2013-02-24', price => 0, is_campaign => 0),
        array(date => '2013-02-25', price => 200, is_campaign => 1),
        array(date => '2013-02-26', price => 0, is_campaign => 0),
        array(date => '2013-02-27', price => 200, is_campaign => 1),
        array(date => '2013-02-28', price => 200, is_campaign => 1),
        array(date => '2013-03-01', price => 200, is_campaign => 1),
        array(date => '2013-03-02', price => 200, is_campaign => 1),
        array(date => '2013-03-03', price => 0, is_campaign => 0),
        array(date => '2013-03-04', price => 200, is_campaign => 1),
        array(date => '2013-03-05', price => 0, is_campaign => 0));
    $date_start = '2013-02-23';
    $date_end = '2013-03-05';
    $week_arr = array();

    for ($i = 0; $i < count($arr_datas); $i++) {
        $data = $arr_datas[$i];
        $week_number = date('W', strtotime($data['date']));
        if (!is_array($week_arr[$week_number])) {
            $week_arr[$week_number] = array();
        }
        $week_arr[$week_number][] = $data;
    }
    echo '<pre>';
    print_r($week_arr);
    echo '</pre>';
    $arr_datas = array();
    foreach ($week_arr as $week) {


        //$arr_week_data = array_combine($arr_k, $arr_data);
        array_push($arr_datas, $arr_week_data);
    }
    ?>
    <?php
    foreach ($arr_datas as $value):
        ?>
        <tr>
            <td><?php echo $value['t2']['price']; ?></td>
            <td><?php echo $value['t3']['price']; ?></td>
            <td><?php echo $value['t4']['price']; ?></td>
            <td><?php echo $value['t5']['price']; ?></td>
            <td><?php echo $value['t6']['price']; ?></td>
            <td><?php echo $value['t7']['price']; ?></td>
            <td><?php echo $value['cn']['price']; ?></td>
        </tr>
        <?php
    endforeach;
    ?>
</table>

<?php

function thu_of_date2($date_input) {
    //tinh thu cua ngay nay
    $jd = cal_to_jd(CAL_GREGORIAN, date('m', strtotime($date_input)), date('d', strtotime($date_input)), date('Y', strtotime($date_input)));
    $thu_of_date = jddayofweek($jd, 0);
    return $thu_of_date;
}

function getDateKey($date_int) {
    switch ($date_int) {
        case 1:
            return 't2';
        case 2:
            return 't3';
        case 3:
            return 't4';
        case 4:
            return 't5';
        case 5:
            return 't6';
        case 6:
            return 't7';
        case 0:
            return 'cn';
        default: break;
    }
}

function getStartDateOfWeek($date_input) {
    $custom_date = strtotime(date('d-m-Y', strtotime($date_input)));
    $week_start = date('d-m-Y', strtotime('this week last monday', $custom_date));
    return $week_start;
}

function getEndDateOfWeek($date_input) {
    $custom_date = strtotime(date('d-m-Y', strtotime($date_input)));
    $week_end = date('d-m-Y', strtotime('this week next sunday', $custom_date));
    return $week_end;
}

?>
