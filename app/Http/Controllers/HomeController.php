<?php

namespace App\Http\Controllers;

use App\Converter\StreamChannel;
use Illuminate\Http\Request;
use Illuminate\View\View;
use WaveformGenerator\Converter\Converter;
use WaveformGenerator\Parsers\FFMpegParser;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $data = [
            'channel_name_1' => 'user',
            'raw_input_1' => $this->getUserDefaultStream(),
            'channel_name_2' => 'customer',
            'raw_input_2' => $this->getDefaultCustomerStream(),
            'total_session_time' => 1863.16
        ];

        return view('home')->with('data', $data);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function process(Request $request): View
    {

        $totalSessionTime = $request->get('total_session_time');
        $channel1 = new StreamChannel($request->get('channel_name_1'), $request->get('raw_input_1'), $totalSessionTime);
        $channel2 = new StreamChannel($request->get('channel_name_2'), $request->get('raw_input_2'), $totalSessionTime);

        $parser = new FFMpegParser();
        $converter = new Converter($parser, $totalSessionTime);
        $converter->addChannel($channel1);
        $converter->addChannel($channel2);

        return view('home')
            ->with('converter', $converter)
            ->with('data', $request->all());
    }


    protected function getUserDefaultStream()
    {
        return <<< EOT
[silencedetect @ 0x7fbfbbc076a0] silence_start: 3.504
[silencedetect @ 0x7fbfbbc076a0] silence_end: 6.656 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 14
[silencedetect @ 0x7fbfbbc076a0] silence_end: 19.712 | silence_duration: 5.712
[silencedetect @ 0x7fbfbbc076a0] silence_start: 20.144
[silencedetect @ 0x7fbfbbc076a0] silence_end: 27.264 | silence_duration: 7.12
[silencedetect @ 0x7fbfbbc076a0] silence_start: 36.528
[silencedetect @ 0x7fbfbbc076a0] silence_end: 41.728 | silence_duration: 5.2
[silencedetect @ 0x7fbfbbc076a0] silence_start: 47.28
[silencedetect @ 0x7fbfbbc076a0] silence_end: 49.792 | silence_duration: 2.512
[silencedetect @ 0x7fbfbbc076a0] silence_start: 61.104
[silencedetect @ 0x7fbfbbc076a0] silence_end: 65.024 | silence_duration: 3.92
[silencedetect @ 0x7fbfbbc076a0] silence_start: 79.024
[silencedetect @ 0x7fbfbbc076a0] silence_end: 81.152 | silence_duration: 2.128
[silencedetect @ 0x7fbfbbc076a0] silence_start: 125.232
[silencedetect @ 0x7fbfbbc076a0] silence_end: 128.384 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 128.56
[silencedetect @ 0x7fbfbbc076a0] silence_end: 132.224 | silence_duration: 3.664
[silencedetect @ 0x7fbfbbc076a0] silence_start: 132.656
[silencedetect @ 0x7fbfbbc076a0] silence_end: 142.464 | silence_duration: 9.808
[silencedetect @ 0x7fbfbbc076a0] silence_start: 143.92
[silencedetect @ 0x7fbfbbc076a0] silence_end: 147.072 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 147.888
[silencedetect @ 0x7fbfbbc076a0] silence_end: 166.272 | silence_duration: 18.384
[silencedetect @ 0x7fbfbbc076a0] silence_start: 167.472
[silencedetect @ 0x7fbfbbc076a0] silence_end: 169.6 | silence_duration: 2.128
[silencedetect @ 0x7fbfbbc076a0] silence_start: 189.616
[silencedetect @ 0x7fbfbbc076a0] silence_end: 195.584 | silence_duration: 5.968
[silencedetect @ 0x7fbfbbc076a0] silence_start: 202.288
[silencedetect @ 0x7fbfbbc076a0] silence_end: 204.672 | silence_duration: 2.384
[silencedetect @ 0x7fbfbbc076a0] silence_start: 204.72
[silencedetect @ 0x7fbfbbc076a0] silence_end: 207.232 | silence_duration: 2.512
[silencedetect @ 0x7fbfbbc076a0] silence_start: 207.28
[silencedetect @ 0x7fbfbbc076a0] silence_end: 215.68 | silence_duration: 8.4
[silencedetect @ 0x7fbfbbc076a0] silence_start: 218.16
[silencedetect @ 0x7fbfbbc076a0] silence_end: 220.16 | silence_duration: 2
[silencedetect @ 0x7fbfbbc076a0] silence_start: 222
[silencedetect @ 0x7fbfbbc076a0] silence_end: 224.128 | silence_duration: 2.128
[silencedetect @ 0x7fbfbbc076a0] silence_start: 225.968
[silencedetect @ 0x7fbfbbc076a0] silence_end: 229.888 | silence_duration: 3.92
[silencedetect @ 0x7fbfbbc076a0] silence_start: 231.856
[silencedetect @ 0x7fbfbbc076a0] silence_end: 235.392 | silence_duration: 3.536
[silencedetect @ 0x7fbfbbc076a0] silence_start: 235.44
[silencedetect @ 0x7fbfbbc076a0] silence_end: 240.512 | silence_duration: 5.072
[silencedetect @ 0x7fbfbbc076a0] silence_start: 240.56
[silencedetect @ 0x7fbfbbc076a0] silence_end: 244.864 | silence_duration: 4.304
[silencedetect @ 0x7fbfbbc076a0] silence_start: 245.424
[silencedetect @ 0x7fbfbbc076a0] silence_end: 249.344 | silence_duration: 3.92
[silencedetect @ 0x7fbfbbc076a0] silence_start: 249.264
[silencedetect @ 0x7fbfbbc076a0] silence_end: 259.712 | silence_duration: 10.448
[silencedetect @ 0x7fbfbbc076a0] silence_start: 259.76
[silencedetect @ 0x7fbfbbc076a0] silence_end: 262.144 | silence_duration: 2.384
[silencedetect @ 0x7fbfbbc076a0] silence_start: 269.232
[silencedetect @ 0x7fbfbbc076a0] silence_end: 272.256 | silence_duration: 3.024
[silencedetect @ 0x7fbfbbc076a0] silence_start: 275.12
[silencedetect @ 0x7fbfbbc076a0] silence_end: 277.632 | silence_duration: 2.512
[silencedetect @ 0x7fbfbbc076a0] silence_start: 278.064
[silencedetect @ 0x7fbfbbc076a0] silence_end: 280.32 | silence_duration: 2.256
[silencedetect @ 0x7fbfbbc076a0] silence_start: 284.08
[silencedetect @ 0x7fbfbbc076a0] silence_end: 286.464 | silence_duration: 2.384
[silencedetect @ 0x7fbfbbc076a0] silence_start: 293.936
[silencedetect @ 0x7fbfbbc076a0] silence_end: 297.088 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 300.592
[silencedetect @ 0x7fbfbbc076a0] silence_end: 303.872 | silence_duration: 3.28
[silencedetect @ 0x7fbfbbc076a0] silence_start: 342.96
[silencedetect @ 0x7fbfbbc076a0] silence_end: 345.6 | silence_duration: 2.64
[silencedetect @ 0x7fbfbbc076a0] silence_start: 346.032
[silencedetect @ 0x7fbfbbc076a0] silence_end: 348.416 | silence_duration: 2.384
[silencedetect @ 0x7fbfbbc076a0] silence_start: 353.2
[silencedetect @ 0x7fbfbbc076a0] silence_end: 357.888 | silence_duration: 4.688
[silencedetect @ 0x7fbfbbc076a0] silence_start: 358.448
[silencedetect @ 0x7fbfbbc076a0] silence_end: 369.408 | silence_duration: 10.96
[silencedetect @ 0x7fbfbbc076a0] silence_start: 370.224
[silencedetect @ 0x7fbfbbc076a0] silence_end: 390.784 | silence_duration: 20.56
[silencedetect @ 0x7fbfbbc076a0] silence_start: 429.488
[silencedetect @ 0x7fbfbbc076a0] silence_end: 433.536 | silence_duration: 4.048
[silencedetect @ 0x7fbfbbc076a0] silence_start: 433.968
[silencedetect @ 0x7fbfbbc076a0] silence_end: 439.936 | silence_duration: 5.968
[silencedetect @ 0x7fbfbbc076a0] silence_start: 444.336
[silencedetect @ 0x7fbfbbc076a0] silence_end: 456.96 | silence_duration: 12.624
[silencedetect @ 0x7fbfbbc076a0] silence_start: 456.88
[silencedetect @ 0x7fbfbbc076a0] silence_end: 460.416 | silence_duration: 3.536
[silencedetect @ 0x7fbfbbc076a0] silence_start: 460.336
[silencedetect @ 0x7fbfbbc076a0] silence_end: 465.408 | silence_duration: 5.072
[silencedetect @ 0x7fbfbbc076a0] silence_start: 468.912
[silencedetect @ 0x7fbfbbc076a0] silence_end: 480 | silence_duration: 11.088
[silencedetect @ 0x7fbfbbc076a0] silence_start: 479.92
[silencedetect @ 0x7fbfbbc076a0] silence_end: 492.8 | silence_duration: 12.88
[silencedetect @ 0x7fbfbbc076a0] silence_start: 492.72
[silencedetect @ 0x7fbfbbc076a0] silence_end: 499.456 | silence_duration: 6.736
[silencedetect @ 0x7fbfbbc076a0] silence_start: 499.76
[silencedetect @ 0x7fbfbbc076a0] silence_end: 507.392 | silence_duration: 7.632
[silencedetect @ 0x7fbfbbc076a0] silence_start: 508.464
[silencedetect @ 0x7fbfbbc076a0] silence_end: 511.232 | silence_duration: 2.768
[silencedetect @ 0x7fbfbbc076a0] silence_start: 542.128
[silencedetect @ 0x7fbfbbc076a0] silence_end: 552.704 | silence_duration: 10.576
[silencedetect @ 0x7fbfbbc076a0] silence_start: 552.752
[silencedetect @ 0x7fbfbbc076a0] silence_end: 555.904 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 556.464
[silencedetect @ 0x7fbfbbc076a0] silence_end: 564.096 | silence_duration: 7.632
[silencedetect @ 0x7fbfbbc076a0] silence_start: 568.752
[silencedetect @ 0x7fbfbbc076a0] silence_end: 572.8 | silence_duration: 4.048
[silencedetect @ 0x7fbfbbc076a0] silence_start: 572.848
[silencedetect @ 0x7fbfbbc076a0] silence_end: 575.104 | silence_duration: 2.256
[silencedetect @ 0x7fbfbbc076a0] silence_start: 576.176
[silencedetect @ 0x7fbfbbc076a0] silence_end: 582.016 | silence_duration: 5.84
[silencedetect @ 0x7fbfbbc076a0] silence_start: 582.704
[silencedetect @ 0x7fbfbbc076a0] silence_end: 585.472 | silence_duration: 2.768
[silencedetect @ 0x7fbfbbc076a0] silence_start: 587.824
[silencedetect @ 0x7fbfbbc076a0] silence_end: 592.768 | silence_duration: 4.944
[silencedetect @ 0x7fbfbbc076a0] silence_start: 595.12
[silencedetect @ 0x7fbfbbc076a0] silence_end: 598.528 | silence_duration: 3.408
[silencedetect @ 0x7fbfbbc076a0] silence_start: 610.352
[silencedetect @ 0x7fbfbbc076a0] silence_end: 619.648 | silence_duration: 9.296
[silencedetect @ 0x7fbfbbc076a0] silence_start: 619.696
[silencedetect @ 0x7fbfbbc076a0] silence_end: 622.848 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 659.504
[silencedetect @ 0x7fbfbbc076a0] silence_end: 662.272 | silence_duration: 2.768
[silencedetect @ 0x7fbfbbc076a0] silence_start: 663.344
[silencedetect @ 0x7fbfbbc076a0] silence_end: 670.976 | silence_duration: 7.632
[silencedetect @ 0x7fbfbbc076a0] silence_start: 673.2
[silencedetect @ 0x7fbfbbc076a0] silence_end: 681.216 | silence_duration: 8.016
[silencedetect @ 0x7fbfbbc076a0] silence_start: 681.648
[silencedetect @ 0x7fbfbbc076a0] silence_end: 683.904 | silence_duration: 2.256
[silencedetect @ 0x7fbfbbc076a0] silence_start: 685.488
[silencedetect @ 0x7fbfbbc076a0] silence_end: 688.128 | silence_duration: 2.64
[silencedetect @ 0x7fbfbbc076a0] silence_start: 688.048
[silencedetect @ 0x7fbfbbc076a0] silence_end: 691.2 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 692.656
[silencedetect @ 0x7fbfbbc076a0] silence_end: 696.448 | silence_duration: 3.792
[silencedetect @ 0x7fbfbbc076a0] silence_start: 708.784
[silencedetect @ 0x7fbfbbc076a0] silence_end: 711.552 | silence_duration: 2.768
[silencedetect @ 0x7fbfbbc076a0] silence_start: 752.048
[silencedetect @ 0x7fbfbbc076a0] silence_end: 754.688 | silence_duration: 2.64
[silencedetect @ 0x7fbfbbc076a0] silence_start: 759.728
[silencedetect @ 0x7fbfbbc076a0] silence_end: 762.624 | silence_duration: 2.896
[silencedetect @ 0x7fbfbbc076a0] silence_start: 846.896
[silencedetect @ 0x7fbfbbc076a0] silence_end: 857.984 | silence_duration: 11.088
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1135.54
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1139.07 | silence_duration: 3.536
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1139.5
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1144.96 | silence_duration: 5.456
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1267.76
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1271.04 | silence_duration: 3.28
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1271.34
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1275.65 | silence_duration: 4.304
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1275.7
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1283.07 | silence_duration: 7.376
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1283.25
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1291.26 | silence_duration: 8.016
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1291.31
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1296.38 | silence_duration: 5.072
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1297.84
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1300.1 | silence_duration: 2.256
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1300.02
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1302.53 | silence_duration: 2.512
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1304.62
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1310.08 | silence_duration: 5.456
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1310.51
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1315.07 | silence_duration: 4.56
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1637.42
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1643.01 | silence_duration: 5.584
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1643.31
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1648.51 | silence_duration: 5.2
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1650.61
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1654.02 | silence_duration: 3.408
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1654.32
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1663.1 | silence_duration: 8.784
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1663.54
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1672.19 | silence_duration: 8.656
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1672.24
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1680.38 | silence_duration: 8.144
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1680.69
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1685.5 | silence_duration: 4.816
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1716.14
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1720.58 | silence_duration: 4.432
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1721.01
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1724.54 | silence_duration: 3.536
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1724.59
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1735.42 | silence_duration: 10.832
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1778.99
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1782.27 | silence_duration: 3.28
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1783.98
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1786.37 | silence_duration: 2.384
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1787.06
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1790.34 | silence_duration: 3.28
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1790.64
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1793.79 | silence_duration: 3.152
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1794.99
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1799.17 | silence_duration: 4.176
[silencedetect @ 0x7fbfbbc076a0] silence_start: 1852.85
[silencedetect @ 0x7fbfbbc076a0] silence_end: 1856.77 | silence_duration: 3.92
EOT;
    }


    public function getDefaultCustomerStream()
    {
        return <<< EOT
[silencedetect @ 0x7fa7edd0c160] silence_start: 1.84
[silencedetect @ 0x7fa7edd0c160] silence_end: 4.48 | silence_duration: 2.64
[silencedetect @ 0x7fa7edd0c160] silence_start: 26.928
[silencedetect @ 0x7fa7edd0c160] silence_end: 29.184 | silence_duration: 2.256
[silencedetect @ 0x7fa7edd0c160] silence_start: 29.36
[silencedetect @ 0x7fa7edd0c160] silence_end: 31.744 | silence_duration: 2.384
[silencedetect @ 0x7fa7edd0c160] silence_start: 56.624
[silencedetect @ 0x7fa7edd0c160] silence_end: 58.624 | silence_duration: 2
[silencedetect @ 0x7fa7edd0c160] silence_start: 66.992
[silencedetect @ 0x7fa7edd0c160] silence_end: 69.632 | silence_duration: 2.64
[silencedetect @ 0x7fa7edd0c160] silence_start: 91.184
[silencedetect @ 0x7fa7edd0c160] silence_end: 106.496 | silence_duration: 15.312
[silencedetect @ 0x7fa7edd0c160] silence_start: 108.976
[silencedetect @ 0x7fa7edd0c160] silence_end: 112.384 | silence_duration: 3.408
[silencedetect @ 0x7fa7edd0c160] silence_start: 290.352
[silencedetect @ 0x7fa7edd0c160] silence_end: 295.936 | silence_duration: 5.584
[silencedetect @ 0x7fa7edd0c160] silence_start: 308.144
[silencedetect @ 0x7fa7edd0c160] silence_end: 338.56 | silence_duration: 30.416
[silencedetect @ 0x7fa7edd0c160] silence_start: 338.864
[silencedetect @ 0x7fa7edd0c160] silence_end: 344.064 | silence_duration: 5.2
[silencedetect @ 0x7fa7edd0c160] silence_start: 400.688
[silencedetect @ 0x7fa7edd0c160] silence_end: 406.272 | silence_duration: 5.584
[silencedetect @ 0x7fa7edd0c160] silence_start: 406.448
[silencedetect @ 0x7fa7edd0c160] silence_end: 410.24 | silence_duration: 3.792
[silencedetect @ 0x7fa7edd0c160] silence_start: 412.592
[silencedetect @ 0x7fa7edd0c160] silence_end: 419.456 | silence_duration: 6.864
[silencedetect @ 0x7fa7edd0c160] silence_start: 420.016
[silencedetect @ 0x7fa7edd0c160] silence_end: 423.424 | silence_duration: 3.408
[silencedetect @ 0x7fa7edd0c160] silence_start: 424.88
[silencedetect @ 0x7fa7edd0c160] silence_end: 428.032 | silence_duration: 3.152
[silencedetect @ 0x7fa7edd0c160] silence_start: 428.08
[silencedetect @ 0x7fa7edd0c160] silence_end: 430.336 | silence_duration: 2.256
[silencedetect @ 0x7fa7edd0c160] silence_start: 517.168
[silencedetect @ 0x7fa7edd0c160] silence_end: 519.296 | silence_duration: 2.128
[silencedetect @ 0x7fa7edd0c160] silence_start: 519.472
[silencedetect @ 0x7fa7edd0c160] silence_end: 521.856 | silence_duration: 2.384
[silencedetect @ 0x7fa7edd0c160] silence_start: 521.904
[silencedetect @ 0x7fa7edd0c160] silence_end: 535.808 | silence_duration: 13.904
[silencedetect @ 0x7fa7edd0c160] silence_start: 536.112
[silencedetect @ 0x7fa7edd0c160] silence_end: 540.672 | silence_duration: 4.56
[silencedetect @ 0x7fa7edd0c160] silence_start: 599.6
[silencedetect @ 0x7fa7edd0c160] silence_end: 602.752 | silence_duration: 3.152
[silencedetect @ 0x7fa7edd0c160] silence_start: 603.056
[silencedetect @ 0x7fa7edd0c160] silence_end: 606.208 | silence_duration: 3.152
[silencedetect @ 0x7fa7edd0c160] silence_start: 629.936
[silencedetect @ 0x7fa7edd0c160] silence_end: 632.192 | silence_duration: 2.256
[silencedetect @ 0x7fa7edd0c160] silence_start: 632.496
[silencedetect @ 0x7fa7edd0c160] silence_end: 643.072 | silence_duration: 10.576
[silencedetect @ 0x7fa7edd0c160] silence_start: 647.856
[silencedetect @ 0x7fa7edd0c160] silence_end: 651.264 | silence_duration: 3.408
[silencedetect @ 0x7fa7edd0c160] silence_start: 651.312
[silencedetect @ 0x7fa7edd0c160] silence_end: 654.592 | silence_duration: 3.28
[silencedetect @ 0x7fa7edd0c160] silence_start: 714.16
[silencedetect @ 0x7fa7edd0c160] silence_end: 726.528 | silence_duration: 12.368
[silencedetect @ 0x7fa7edd0c160] silence_start: 726.704
[silencedetect @ 0x7fa7edd0c160] silence_end: 730.24 | silence_duration: 3.536
[silencedetect @ 0x7fa7edd0c160] silence_start: 732.336
[silencedetect @ 0x7fa7edd0c160] silence_end: 736.256 | silence_duration: 3.92
[silencedetect @ 0x7fa7edd0c160] silence_start: 738.48
[silencedetect @ 0x7fa7edd0c160] silence_end: 742.144 | silence_duration: 3.664
[silencedetect @ 0x7fa7edd0c160] silence_start: 745.264
[silencedetect @ 0x7fa7edd0c160] silence_end: 750.336 | silence_duration: 5.072
[silencedetect @ 0x7fa7edd0c160] silence_start: 754.224
[silencedetect @ 0x7fa7edd0c160] silence_end: 759.04 | silence_duration: 4.816
[silencedetect @ 0x7fa7edd0c160] silence_start: 768.176
[silencedetect @ 0x7fa7edd0c160] silence_end: 770.688 | silence_duration: 2.512
[silencedetect @ 0x7fa7edd0c160] silence_start: 772.144
[silencedetect @ 0x7fa7edd0c160] silence_end: 811.392 | silence_duration: 39.248
[silencedetect @ 0x7fa7edd0c160] silence_start: 811.696
[silencedetect @ 0x7fa7edd0c160] silence_end: 821.632 | silence_duration: 9.936
[silencedetect @ 0x7fa7edd0c160] silence_start: 821.808
[silencedetect @ 0x7fa7edd0c160] silence_end: 828.8 | silence_duration: 6.992
[silencedetect @ 0x7fa7edd0c160] silence_start: 829.616
[silencedetect @ 0x7fa7edd0c160] silence_end: 835.84 | silence_duration: 6.224
[silencedetect @ 0x7fa7edd0c160] silence_start: 840.88
[silencedetect @ 0x7fa7edd0c160] silence_end: 844.416 | silence_duration: 3.536
[silencedetect @ 0x7fa7edd0c160] silence_start: 858.416
[silencedetect @ 0x7fa7edd0c160] silence_end: 876.032 | silence_duration: 17.616
[silencedetect @ 0x7fa7edd0c160] silence_start: 876.08
[silencedetect @ 0x7fa7edd0c160] silence_end: 878.208 | silence_duration: 2.128
[silencedetect @ 0x7fa7edd0c160] silence_start: 882.864
[silencedetect @ 0x7fa7edd0c160] silence_end: 899.072 | silence_duration: 16.208
[silencedetect @ 0x7fa7edd0c160] silence_start: 899.376
[silencedetect @ 0x7fa7edd0c160] silence_end: 901.76 | silence_duration: 2.384
[silencedetect @ 0x7fa7edd0c160] silence_start: 902.32
[silencedetect @ 0x7fa7edd0c160] silence_end: 930.944 | silence_duration: 28.624
[silencedetect @ 0x7fa7edd0c160] silence_start: 931.376
[silencedetect @ 0x7fa7edd0c160] silence_end: 941.312 | silence_duration: 9.936
[silencedetect @ 0x7fa7edd0c160] silence_start: 943.024
[silencedetect @ 0x7fa7edd0c160] silence_end: 949.888 | silence_duration: 6.864
[silencedetect @ 0x7fa7edd0c160] silence_start: 950.832
[silencedetect @ 0x7fa7edd0c160] silence_end: 980.48 | silence_duration: 29.648
[silencedetect @ 0x7fa7edd0c160] silence_start: 981.296
[silencedetect @ 0x7fa7edd0c160] silence_end: 989.568 | silence_duration: 8.272
[silencedetect @ 0x7fa7edd0c160] silence_start: 989.872
[silencedetect @ 0x7fa7edd0c160] silence_end: 995.84 | silence_duration: 5.968
[silencedetect @ 0x7fa7edd0c160] silence_start: 995.888
[silencedetect @ 0x7fa7edd0c160] silence_end: 1002.62 | silence_duration: 6.736
[silencedetect @ 0x7fa7edd0c160] silence_start: 1003.06
[silencedetect @ 0x7fa7edd0c160] silence_end: 1028.35 | silence_duration: 25.296
[silencedetect @ 0x7fa7edd0c160] silence_start: 1028.78
[silencedetect @ 0x7fa7edd0c160] silence_end: 1073.41 | silence_duration: 44.624
[silencedetect @ 0x7fa7edd0c160] silence_start: 1073.71
[silencedetect @ 0x7fa7edd0c160] silence_end: 1089.92 | silence_duration: 16.208
[silencedetect @ 0x7fa7edd0c160] silence_start: 1090.22
[silencedetect @ 0x7fa7edd0c160] silence_end: 1112.32 | silence_duration: 22.096
[silencedetect @ 0x7fa7edd0c160] silence_start: 1114.16
[silencedetect @ 0x7fa7edd0c160] silence_end: 1127.3 | silence_duration: 13.136
[silencedetect @ 0x7fa7edd0c160] silence_start: 1127.6
[silencedetect @ 0x7fa7edd0c160] silence_end: 1134.98 | silence_duration: 7.376
[silencedetect @ 0x7fa7edd0c160] silence_start: 1144.37
[silencedetect @ 0x7fa7edd0c160] silence_end: 1148.67 | silence_duration: 4.304
[silencedetect @ 0x7fa7edd0c160] silence_start: 1148.72
[silencedetect @ 0x7fa7edd0c160] silence_end: 1153.79 | silence_duration: 5.072
[silencedetect @ 0x7fa7edd0c160] silence_start: 1155.63
[silencedetect @ 0x7fa7edd0c160] silence_end: 1160.45 | silence_duration: 4.816
[silencedetect @ 0x7fa7edd0c160] silence_start: 1161.14
[silencedetect @ 0x7fa7edd0c160] silence_end: 1164.93 | silence_duration: 3.792
[silencedetect @ 0x7fa7edd0c160] silence_start: 1165.1
[silencedetect @ 0x7fa7edd0c160] silence_end: 1171.97 | silence_duration: 6.864
[silencedetect @ 0x7fa7edd0c160] silence_start: 1172.02
[silencedetect @ 0x7fa7edd0c160] silence_end: 1176.7 | silence_duration: 4.688
[silencedetect @ 0x7fa7edd0c160] silence_start: 1177.26
[silencedetect @ 0x7fa7edd0c160] silence_end: 1179.9 | silence_duration: 2.64
[silencedetect @ 0x7fa7edd0c160] silence_start: 1188.53
[silencedetect @ 0x7fa7edd0c160] silence_end: 1194.88 | silence_duration: 6.352
[silencedetect @ 0x7fa7edd0c160] silence_start: 1195.18
[silencedetect @ 0x7fa7edd0c160] silence_end: 1197.57 | silence_duration: 2.384
[silencedetect @ 0x7fa7edd0c160] silence_start: 1197.49
[silencedetect @ 0x7fa7edd0c160] silence_end: 1212.54 | silence_duration: 15.056
[silencedetect @ 0x7fa7edd0c160] silence_start: 1216.69
[silencedetect @ 0x7fa7edd0c160] silence_end: 1219.84 | silence_duration: 3.152
[silencedetect @ 0x7fa7edd0c160] silence_start: 1220.14
[silencedetect @ 0x7fa7edd0c160] silence_end: 1229.31 | silence_duration: 9.168
[silencedetect @ 0x7fa7edd0c160] silence_start: 1229.62
[silencedetect @ 0x7fa7edd0c160] silence_end: 1243.39 | silence_duration: 13.776
[silencedetect @ 0x7fa7edd0c160] silence_start: 1245.36
[silencedetect @ 0x7fa7edd0c160] silence_end: 1251.97 | silence_duration: 6.608
[silencedetect @ 0x7fa7edd0c160] silence_start: 1254.7
[silencedetect @ 0x7fa7edd0c160] silence_end: 1260.03 | silence_duration: 5.328
[silencedetect @ 0x7fa7edd0c160] silence_start: 1264.43
[silencedetect @ 0x7fa7edd0c160] silence_end: 1266.94 | silence_duration: 2.512
[silencedetect @ 0x7fa7edd0c160] silence_start: 1314.74
[silencedetect @ 0x7fa7edd0c160] silence_end: 1319.68 | silence_duration: 4.944
[silencedetect @ 0x7fa7edd0c160] silence_start: 1319.86
[silencedetect @ 0x7fa7edd0c160] silence_end: 1323.39 | silence_duration: 3.536
[silencedetect @ 0x7fa7edd0c160] silence_start: 1324.72
[silencedetect @ 0x7fa7edd0c160] silence_end: 1328.9 | silence_duration: 4.176
[silencedetect @ 0x7fa7edd0c160] silence_start: 1329.58
[silencedetect @ 0x7fa7edd0c160] silence_end: 1341.57 | silence_duration: 11.984
[silencedetect @ 0x7fa7edd0c160] silence_start: 1343.79
[silencedetect @ 0x7fa7edd0c160] silence_end: 1354.11 | silence_duration: 10.32
[silencedetect @ 0x7fa7edd0c160] silence_start: 1354.16
[silencedetect @ 0x7fa7edd0c160] silence_end: 1356.54 | silence_duration: 2.384
[silencedetect @ 0x7fa7edd0c160] silence_start: 1358.64
[silencedetect @ 0x7fa7edd0c160] silence_end: 1362.3 | silence_duration: 3.664
[silencedetect @ 0x7fa7edd0c160] silence_start: 1362.48
[silencedetect @ 0x7fa7edd0c160] silence_end: 1367.17 | silence_duration: 4.688
[silencedetect @ 0x7fa7edd0c160] silence_start: 1372.46
[silencedetect @ 0x7fa7edd0c160] silence_end: 1377.66 | silence_duration: 5.2
[silencedetect @ 0x7fa7edd0c160] silence_start: 1377.97
[silencedetect @ 0x7fa7edd0c160] silence_end: 1381.5 | silence_duration: 3.536
[silencedetect @ 0x7fa7edd0c160] silence_start: 1381.68
[silencedetect @ 0x7fa7edd0c160] silence_end: 1386.11 | silence_duration: 4.432
[silencedetect @ 0x7fa7edd0c160] silence_start: 1387.18
[silencedetect @ 0x7fa7edd0c160] silence_end: 1391.23 | silence_duration: 4.048
[silencedetect @ 0x7fa7edd0c160] silence_start: 1391.79
[silencedetect @ 0x7fa7edd0c160] silence_end: 1394.56 | silence_duration: 2.768
[silencedetect @ 0x7fa7edd0c160] silence_start: 1394.61
[silencedetect @ 0x7fa7edd0c160] silence_end: 1401.86 | silence_duration: 7.248
[silencedetect @ 0x7fa7edd0c160] silence_start: 1401.9
[silencedetect @ 0x7fa7edd0c160] silence_end: 1406.21 | silence_duration: 4.304
[silencedetect @ 0x7fa7edd0c160] silence_start: 1408.18
[silencedetect @ 0x7fa7edd0c160] silence_end: 1416.58 | silence_duration: 8.4
[silencedetect @ 0x7fa7edd0c160] silence_start: 1416.88
[silencedetect @ 0x7fa7edd0c160] silence_end: 1433.6 | silence_duration: 16.72
[silencedetect @ 0x7fa7edd0c160] silence_start: 1435.82
[silencedetect @ 0x7fa7edd0c160] silence_end: 1440.13 | silence_duration: 4.304
[silencedetect @ 0x7fa7edd0c160] silence_start: 1441.07
[silencedetect @ 0x7fa7edd0c160] silence_end: 1469.7 | silence_duration: 28.624
[silencedetect @ 0x7fa7edd0c160] silence_start: 1469.87
[silencedetect @ 0x7fa7edd0c160] silence_end: 1477.76 | silence_duration: 7.888
[silencedetect @ 0x7fa7edd0c160] silence_start: 1477.94
[silencedetect @ 0x7fa7edd0c160] silence_end: 1487.62 | silence_duration: 9.68
[silencedetect @ 0x7fa7edd0c160] silence_start: 1487.92
[silencedetect @ 0x7fa7edd0c160] silence_end: 1494.66 | silence_duration: 6.736
[silencedetect @ 0x7fa7edd0c160] silence_start: 1496.62
[silencedetect @ 0x7fa7edd0c160] silence_end: 1525.89 | silence_duration: 29.264
[silencedetect @ 0x7fa7edd0c160] silence_start: 1526.06
[silencedetect @ 0x7fa7edd0c160] silence_end: 1536.13 | silence_duration: 10.064
[silencedetect @ 0x7fa7edd0c160] silence_start: 1543.98
[silencedetect @ 0x7fa7edd0c160] silence_end: 1565.44 | silence_duration: 21.456
[silencedetect @ 0x7fa7edd0c160] silence_start: 1565.74
[silencedetect @ 0x7fa7edd0c160] silence_end: 1576.58 | silence_duration: 10.832
[silencedetect @ 0x7fa7edd0c160] silence_start: 1577.78
[silencedetect @ 0x7fa7edd0c160] silence_end: 1602.69 | silence_duration: 24.912
[silencedetect @ 0x7fa7edd0c160] silence_start: 1602.99
[silencedetect @ 0x7fa7edd0c160] silence_end: 1626.75 | silence_duration: 23.76
[silencedetect @ 0x7fa7edd0c160] silence_start: 1631.41
[silencedetect @ 0x7fa7edd0c160] silence_end: 1635.84 | silence_duration: 4.432
[silencedetect @ 0x7fa7edd0c160] silence_start: 1685.04
[silencedetect @ 0x7fa7edd0c160] silence_end: 1698.82 | silence_duration: 13.776
[silencedetect @ 0x7fa7edd0c160] silence_start: 1699.12
[silencedetect @ 0x7fa7edd0c160] silence_end: 1701.76 | silence_duration: 2.64
[silencedetect @ 0x7fa7edd0c160] silence_start: 1701.94
[silencedetect @ 0x7fa7edd0c160] silence_end: 1715.2 | silence_duration: 13.264
[silencedetect @ 0x7fa7edd0c160] silence_start: 1741.74
[silencedetect @ 0x7fa7edd0c160] silence_end: 1744.51 | silence_duration: 2.768
[silencedetect @ 0x7fa7edd0c160] silence_start: 1758
[silencedetect @ 0x7fa7edd0c160] silence_end: 1760.38 | silence_duration: 2.384
[silencedetect @ 0x7fa7edd0c160] silence_start: 1761.2
[silencedetect @ 0x7fa7edd0c160] silence_end: 1767.42 | silence_duration: 6.224
[silencedetect @ 0x7fa7edd0c160] silence_start: 1767.47
[silencedetect @ 0x7fa7edd0c160] silence_end: 1770.24 | silence_duration: 2.768
[silencedetect @ 0x7fa7edd0c160] silence_start: 1770.54
[silencedetect @ 0x7fa7edd0c160] silence_end: 1775.87 | silence_duration: 5.328
[silencedetect @ 0x7fa7edd0c160] silence_start: 1801.65
[silencedetect @ 0x7fa7edd0c160] silence_end: 1805.31 | silence_duration: 3.664
[silencedetect @ 0x7fa7edd0c160] silence_start: 1805.62
[silencedetect @ 0x7fa7edd0c160] silence_end: 1813.25 | silence_duration: 7.632
[silencedetect @ 0x7fa7edd0c160] silence_start: 1813.55
[silencedetect @ 0x7fa7edd0c160] silence_end: 1837.18 | silence_duration: 23.632
[silencedetect @ 0x7fa7edd0c160] silence_start: 1840.05
[silencedetect @ 0x7fa7edd0c160] silence_end: 1843.71 | silence_duration: 3.664
[silencedetect @ 0x7fa7edd0c160] silence_start: 1844.66
[silencedetect @ 0x7fa7edd0c160] silence_end: 1851.01 | silence_duration: 6.352
EOT;

    }
}
