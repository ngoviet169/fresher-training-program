<?php
    
    $arr = array(
        'Viettel'  => ['098', '097', '096', '0169', '0168',
                            '0167', '0166', '0165', '0164', '0163', '0162'],
        'Vinaphone' => ['091', '094', '0123', '0124',
                             '0125', '0127', '0129'],
        'Mobiphone' => ['090', '093', '0120', '0121', '0122', '0126', '0128']
        );

    $email = [
        'fresher01@gmail.com',
        'fresher02@gmail.com',
        'fresher03@gmail.com',
        'fresher01@ntq-solutions.com.vn',
        'fresher02@ntq-solutions.com.vn',
        'fresher03@ntq-solutions.com.vn',
        '01fresher01@ntq-solutions.com.vn',
    ];

    //ham check so dien thoai
    function checkHopLe($sdt)
    {
        if(preg_match('/ /', $sdt))
        {
            echo 'co khoang trang <br>';
        }else {
            echo 'khong co khoang trang <br>';
        }

        if(preg_match('/^[0-9]+$/', $sdt)) {
            echo 'la so <br>';
        } else {
            echo 'khong phai la so <br>';
        }

        if(preg_match('/^[0][9][6-8]\d{7}$|^[0][1][6][2-9]\d{7}$/', $sdt)) {
            echo 'So Viettel <br>';
        } elseif(preg_match('/^[0][9][1,4]\d{7}$|^[0][1][2][3,4,5,7,9]\d{7}$/', $sdt)) {
            echo 'So Vinaphone <br>';
        }elseif(preg_match('/^[0][9][0,3]\d{7}$|^[0][1][2][0,2,6,8]\d{7}$/', $sdt)) {
            echo 'So Mobiphone <br>';
        } else {
            echo 'Khong phai so dien thoai <br>';
        }
    }

    //ham check email
    function checkEmail($email)
    {
        $result = array();
        // $email1 = implode(',', $email);
        foreach ($email as $key => $value) {
            if(preg_match('/^fresher[a-zA-Z0-9]*@ntq\-solutions\.com\.vn$/', $value))
            {
                array_push($result, $value);
            }
             
        }
        
        return $result;
    }

    echo "<pre>";
    echo checkHopLe('01289587098');
    var_dump(checkEmail($email));
