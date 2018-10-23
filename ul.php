<?php
<ul class="pagination">
                <li>
                    <a href="./user.php?<?=$ext?>page=<?= $prev .$urlext?>">上一页</a>
                </li>
                <?php
                for ($p = $start; $p <= $end; $p++)
                {


                    echo '<li>
                        <a href="./user.php?'.$ext.'page='  . $p . $urlext. '">' . $p . '</a></li>';
                }
                ?>
                <li>
                    <a href="./user.php?<?=$ext?>page=<?= $next . $urlext ?>" >下一页</a>
                </li>


            </ul>