<!-- etiquetas -->
<div class="container-fluid etiquetas mt-0 d-none d-md-block" style="display: flex; text-transform: uppercase;">
    <div class="container">
        <div class="row raleway400">
            <div class="col text-center">
                <?php
                $posttags = get_the_tags();
                $etiquetas = "";
                if (!empty($posttags)) {
                ?>
                    <p class="pt-1 pb-1 mb-0">
                        <i class="fa-solid fa-tag" style="margin-right: 10px; color:white;" aria-hidden="true"></i>
                        <?php
                        foreach ($posttags as $tag) {
                            $etiquetas .= '<a href="' . esc_attr(get_tag_link($tag->term_id)) . '">' . mb_strtoupper($tag->name)  . '</a>' . ' - ';
                        }
                        $etiquetas = substr($etiquetas, 0, -2); //quita la ultima coma y el ultimo espacio
                        print($etiquetas);
                        ?>
                        <i class="fa-solid fa-tag" style="margin-left: 10px; color:white;" aria-hidden="true"></i>
                    </p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>