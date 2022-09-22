                                <div id="autodata">
                                    <?php
                                        //$no=0;
                                        foreach ($result_tawar as $row){
                                            //$no++;
                                    ?>
                                    <tr>
                                        <!-- <td><?//=$no?></td> -->
                                        <th><?=$row['nama']?></th>
                                        <th>Rp. <?=number_format($row['harga_tawar'])?></th>
                                    </tr>
                                    <?php } ?>
                                </div>