<div class="loginsuccess" data-flashdata="<?=$this->session->flashdata('loginsuccess')?>"></div>
<div class="page-header">
    <div class="row align-items-end" style="background: white; border-radius: 3px; box-shadow: 0 1px 15px rgba(0,0,0,0.04), 0 1px 6px rgba(0,0,0,0.04);">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-layers"></i>
                <div class="d-inline">
                    <h5>Dashboard</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('dashboard') ?>"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row clearfix">
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="widget bg-info">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Item Total</h6>
                        <h2><?=$item?></h2>
                        
                    </div>
                    <div class="icon">
                        <i class="ik ik-shopping-bag"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="widget bg-warning">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Transaction</h6>
                        <h2><?=$selled?></h2>
                    </div>
                    <div class="icon">
                        <i class="ik ik-shopping-cart"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="widget bg-success">
            <div class="widget-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="state">
                        <h6>Total Payment</h6>
                        <h2><?=idr($total)?></h2>
                        
                    </div>
                    <div class="icon">
                        <i class="ik ik-dollar-sign"></i> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3><?=date('F')?> Monthly Payment</h3>
            </div>
            <div class="card-block text-center">
                <div id="line_chart" class="chart-shadow" style="height:400px"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var chart = AmCharts.makeChart("line_chart", {
        "type": "serial",
        "theme": "light",
        "dataDateFormat": "YYYY-MM-DD",
        "precision": 1,
        "valueAxes": [{
            "id": "v1",
            "position": "left",
            "autoGridCount": false,
            "labelFunction": function(value) {
                return "Rp." + Math.round(value);
            }
            },],
            "graphs": [{
                "id": "g1",
                "valueAxis": "v2",
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "bulletSize": 8,
                "hideBulletsCount": 50,
                "lineThickness": 3,
                "lineColor": "#2ed8b6",
                "title": "Transaction",
                "useLineColorForBulletBorder": true,
                "valueField": "selled",
                "balloonText": "[[title]]<br /><b style='font-size: 130%'>Rp.[[value]]</b>"
            }],
            "chartCursor": {
                "pan": true,
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true,
                "cursorAlpha": 0,
                "valueLineAlpha": 0.2
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "dashLength": 1,
                "minorGridEnabled": true
            },
            "legend": {
                "useGraphSettings": true,
                "position": "top"
            },
            "balloon": {
                "borderThickness": 1,
                "shadowAlpha": 0
            },
            "dataProvider": [
            <?php foreach ($trans as $result) { ?>
                {
                    "date": "<?=$result->date?>",
                    "selled": <?php 
                        $sql = $this->db->query("SELECT SUM(total) as semua FROM transaction WHERE transaction.date = '$result->date'")->row();
                        echo $sql->semua;?>
                },
            <?php }?>
            ]
        });
    })
</script>