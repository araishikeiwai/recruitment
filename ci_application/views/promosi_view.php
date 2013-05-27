<!--    
- View - Promosi
-  
- Halaman pengajuan promosi lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.0
-->

<div class="span3" style="display: block; width: 213px; float: left; min-height: 100% !important; height: auto; padding-top: 10px; padding-bottom: 10px; margin-top: 10px; margin-left: 7px;">
    <h4>&nbsp;Lowongan Featured</h4>
    <br/>
    <?php 
        $list_promosi = get_promosi($this -> db);
        $num = count($list_promosi);

        for ($i = 0; $i < $num; $i++) {
            echo '<p>';
            echo lowongan_link($list_promosi[$i]['id_lowongan'], $list_promosi[$i]['judul']);
            echo '</p>';
        }
        for ($i = 0; $i < (5 - $num); $i++) {
            echo '<p><a href=' . base_url() . 'lowongan/history_provider>Promosikan lowongan Anda!</a></p>';
        }
    ?>
</div>
