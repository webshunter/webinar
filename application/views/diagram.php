
<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>Royal Family Tree - Demos | BALKAN OrgChartJS</title>
    <style id="myStyles">
        html, body {
    margin: 0px;
    padding: 0px;
    width: 100%;
    height: 100%;
    font-family: Helvetica;
    overflow: hidden;
}

#tree {
    width: 100%;
    height: 100%;
}


  .cdf{
    position: fixed;
    top:0;
    margin: 0;
    display: inline-block;
    z-index: 999;
  }

    </style>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>
<body>
    <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
    <div class="cdf">
      <a href="<?= site_url('home/keluargabaru'); ?>" class="btn btn-primary">Tambah Keluarga</a>
      <a href="<?= site_url('admin/tree'); ?>" class="btn btn-primary">Kembali</a>
    </div>
    <?php

      $iduser = iduser();
      $cc = $this->db->query("SELECT
        a.*,
	b.tgllahir,
	b.nama,
	b.foto,
	c.id as idkel,
	c.keluarga,
	d.pekerjaan
FROM
	tree a
	LEFT JOIN user_kel b ON a.user_kel_id = b.id
	LEFT JOIN mkel c ON b.sebagai = c.id
	LEFT JOIN mpekerjaan d ON b.pekerjaan_id = d.id
WHERE
	a.user_id = '$iduser'
ORDER BY
	b.tgllahir ASC")->result();

     ?>

<div id="tree"></div>
    <script>

window.onload = function () {
    OrgChart.templates.family_template = Object.assign({}, OrgChart.templates.ana);
    OrgChart.templates.family_template.size = [86, 86];
    OrgChart.templates.family_template.plus = "";
    OrgChart.templates.family_template.minus = "";
    OrgChart.templates.family_template.rippleRadius = 40;
    OrgChart.templates.family_template.name = '<text style="font-size: 12px;" fill="#000000" x="43" y="100" text-anchor="middle">{val}</text>';
    OrgChart.templates.family_template.title = '<text style="font-size: 12px;" fill="#aeaeae" x="43" y="115" text-anchor="middle">{val}</text>';
    OrgChart.templates.family_template.img = '<clipPath id="{randId}"><circle cx="43" cy="43" r="38.5"></circle></clipPath></circle><image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="3" y="3"  width="80" height="80"></image>';
    OrgChart.templates.family_template.node = '<circle stroke-width="3" fill="none" stroke="#aeaeae" cx="43" cy="43" r="41.5"></circle>';
    OrgChart.templates.family_template.defs = '<g transform="matrix(0.05,0,0,0.05,-13,-15.5)" id="baby"><circle cx="260" cy="310" r="200" fill="#ffffff"></circle><path fill="#aeaeae" d="m468.64 268.32h-13.591c-18.432-89.348-95.612-157.432-189.139-161.798-.501-.185-1.015-.348-1.545-.482-18.363-4.622-31.188-22.595-31.188-43.707 0-17.828 14.468-32.333 32.252-32.333 12.573 0 22.802 10.258 22.802 22.866 0 8.284 6.716 15 15 15s15-6.716 15-15c0-29.15-23.687-52.866-52.802-52.866-34.326 0-62.252 27.962-62.252 62.333 0 17.876 5.828 34.443 15.769 47.432-80.698 15.127-144.725 78.25-161.291 158.555h-13.591c-24.103 0-43.712 19.596-43.712 43.683 0 24.086 19.609 43.682 43.712 43.682h14.692c20.935 89.871 101.582 157.018 197.596 157.018s176.66-67.148 197.596-157.018h14.692c24.103 0 43.712-19.596 43.712-43.682 0-24.087-19.609-43.683-43.712-43.683zm-265.054 55.257c-8.284-.024-14.981-6.758-14.958-15.043.007-2.337-.708-13.999-15.481-14.041-.026 0-.053 0-.08 0-14.697 0-15.475 11.62-15.481 13.953-.023 8.284-6.75 15.007-15.043 14.957-8.284-.024-14.98-6.759-14.957-15.043.038-13.322 5.349-25.101 14.955-33.166 8.223-6.904 19.065-10.702 30.543-10.702h.148c11.534.033 22.412 3.896 30.63 10.876 9.559 8.12 14.803 19.928 14.765 33.25-.023 8.27-6.735 14.957-14.999 14.957-.013.002-.027.002-.042.002zm52.766 129.374c-26.485 0-48.033-21.533-48.033-48.002 0-8.284 6.716-15 15-15s15 6.716 15 15c0 9.926 8.089 18.002 18.033 18.002s18.033-8.076 18.033-18.002c0-8.284 6.716-15 15-15s15 6.716 15 15c-.001 26.469-21.548 48.002-48.033 48.002zm113.765-129.374c-.015 0-.029 0-.044 0-8.284-.024-14.98-6.759-14.957-15.043.016-5.445-1.993-9.263-6.14-11.673-5.407-3.142-13.27-3.165-18.695-.053-4.161 2.387-6.191 6.193-6.207 11.638-.023 8.27-6.735 14.957-14.999 14.957-.015 0-.029 0-.043 0-8.284-.024-14.981-6.758-14.958-15.043.046-16.149 7.802-29.845 21.281-37.576 14.814-8.497 33.929-8.443 48.695.138 13.434 7.807 21.112 21.547 21.066 37.696-.023 8.271-6.735 14.959-14.999 14.959z"/> </g>';
    OrgChart.templates.family_template_blue = Object.assign({}, OrgChart.templates.family_template);
    OrgChart.templates.family_template_blue.node = '<circle stroke-width="3" fill="none" stroke="#039BE5" cx="43" cy="43" r="41.5"></circle>';

    var chart = new OrgChart(document.getElementById("tree"), {
        template: "family_template",
        enableSearch: false,
        siblingSeparation: 100,
        nodeBinding: {
            field_0: 'id',
            name: "name",
            pekerjaan: "pekerjaan",
            img: "img",
        },
        tags: {
            blue: {
                template: "family_template_blue"
            }
        }
    });

    chart.on('render-link', function(sender, args){
        if (args.cnode.ppid != undefined){
            args.html += '<use xlink:href="#baby" x="'+ args.p.xa +'" y="'+ args.p.ya +'"/>';
        }
    });


    var cd = [];
    <?php foreach($cc as $cm => $kl) : ?>
    <?php if($cm == 0) : ?>
        cd.push(
          { id: <?= $kl->id ?>, tags: ["blue"], name: "<?= $kl->nama; ?>", pekerjaan: "<?= $kl->pekerjaan; ?>", img: "<?= base_url('assets/gambar/user_kel/'.$kl->foto) ?>"}
        );
        <?php else : ?>

        <?php if($kl->idkel == 2) : ?>
            <?php $cp = $this->db->query("SELECT * FROM user_kel WHERE id = '$kl->child'")->row()->id; ?>
            <?php $idchild = $this->db->query("SELECT * FROM tree WHERE user_id = '$iduser' AND user_kel_id = '$cp'")->row()->id; ?>
            cd.push(
              { id: <?= $kl->id ?>, pid: <?= $idchild ?>, tags: ["partner"], name: "<?= $kl->nama; ?>", pekerjaan: "<?= $kl->pekerjaan; ?>", img: "<?= base_url('assets/gambar/user_kel/'.$kl->foto) ?>"}
            );
          <?php else : ?>
          <?php $cp = $this->db->query("SELECT * FROM user_kel WHERE id = '$kl->child'")->row()->id; ?>
          <?php $idchild = $this->db->query("SELECT * FROM tree WHERE user_id = '$iduser' AND user_kel_id = '$cp'")->row()->id; ?>
          <?php $parent = $this->db->query("SELECT * FROM tree WHERE user_id = '$iduser' AND child = '$cp' AND mkel_id = '2' ")->row()->id; ?>
          cd.push(
            { id: <?= $kl->id ?>, pid: <?= $idchild ?>, ppid: <?= $parent ?>, tags: ["blue"], name: "<?= $kl->nama; ?>", pekerjaan: "<?= $kl->pekerjaan; ?>", img: "<?= base_url('assets/gambar/user_kel/'.$kl->foto) ?>"}
          );
        <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; ?>
    chart.load(cd);
};
    </script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
