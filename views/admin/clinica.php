<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?= $title ?>
        </h3>
    </div>
    <form id="clinica_form" method="post" action="">
        <input type="hidden" id="id_clinica" name="id_clinica" value="<?= $clinica['ID_CLINICA'] ?>">
        <div class="itens_split">
            <div class="">
                <!--input de imagem-->
                <div class="item_form">
                    <label class="imagem">
                        <input type="file" name="profileLogo" id="profileLogo">
                        <div class="img_perfil">
                            <img src="<?= $clinica['LOGO'] ? Utils::base_url('uploads/') . $clinica['LOGO'] : 'https://static.vecteezy.com/system/resources/previews/013/042/571/original/default-avatar-profile-icon-social-media-user-photo-in-flat-style-vector.jpg' ?>" class="imagePreview" alt="imagem do perfil">
                            <p>Carregar Imagem</p>
                        </div>
                    </label>
                </div>
            </div>
            <div class="content_item_form">
                <div class="item_form">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" value="<?= $clinica['NOME'] ?>" required>
                </div>
                <div class="item_form">
                    <label for="name">CNPJ</label>
                    <input type="text" name="cnpj" id="cnpj" value="<?= $clinica['CNPJ'] ?>" required>
                </div>
                <div class="itens_split">
                    <div class="item_form">
                        <label for="name">Inscrição Estadual</label>
                        <input type="text" name="inscricao_estadual" id="inscricao_estadual" value="<?= $clinica['INSCRICAO_ESTADUAL'] ?>" required>
                    </div>
                    <div class="item_form">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" value="<?= $clinica['EMAIL'] ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="item_form">
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" value="<?= $clinica['CEP'] ?>" required>
        </div>
        <div class="item_form">
            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone" value="<?= $clinica['TELEFONE'] ?? null ?>" required>
        </div>
        <div class="item_form">
            <label for="whatsapp">WhatsApp</label>
            <input type="tel" name="whatsapp" id="whatsapp" value="<?= $clinica['WHATSAPP'] ?? null ?>" required>
        </div>
        <div class="item_form">
            <label for="logradouro">Endereço/Numero</label>
            <input type="text" name="logradouro" id="logradouro" value="<?= $clinica['LOGRADOURO'] ?>" required>
        </div>
        <div class="item_form">
            <label for="name">Bairro</label>
            <input type="text" name="bairro" id="bairro" value="<?= $clinica['BAIRRO'] ?>" required>
        </div>
        <div class="item_form">
            <label for="cidade">Estado</label>
            <input type="text" value="<?= $clinica['ESTADO'] ?>" readonly name="estado" id="estado">
        </div>
        <div class="item_form">
            <label for="cidade">Cidade</label>
            <input type="text" value="<?= $clinica['CIDADE'] ?>" readonly name="cidade" id="cidade">
        </div>

        <h3 class="block text-center w-100">Configurações de Horários</h3>
        <div class="content_times w-100">
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Segunda-Feira</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manha</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SEGUNDA'][0][0]?>" name="segunda[manha_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SEGUNDA'][0][1]?>" name="segunda[manha_termino]" id="segunda" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SEGUNDA'][1][0]?>" name="segunda[almoco_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SEGUNDA'][1][1]?>" name="segunda[almoco_termino]" id="segunda" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SEGUNDA'][2][0]?>" name="segunda[tarde_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SEGUNDA'][2][1]?>" name="segunda[tarde_termino]" id="segunda" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Terça-Feira</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manhã</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['TERCA'][0][0]?>" name="terca[manha_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['TERCA'][0][1]?>" name="terca[manha_termino]" id="terca" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['TERCA'][1][0]?>" name="terca[almoco_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['TERCA'][1][1]?>" name="terca[almoco_termino]" id="terca" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['TERCA'][2][0]?>" name="terca[tarde_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['TERCA'][2][1]?>" name="terca[tarde_termino]" id="terca" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Quarta-Feira</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manhã</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['QUARTA'][0][0]?>" name="quarta[manha_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['QUARTA'][0][1]?>" name="quarta[manha_termino]" id="quarta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['QUARTA'][1][0]?>" name="quarta[almoco_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['QUARTA'][1][1]?>" name="quarta[almoco_termino]" id="quarta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['QUARTA'][2][0]?>" name="quarta[tarde_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['QUARTA'][2][1]?>" name="quarta[tarde_termino]" id="quarta" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Quinta-Feira</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manhã</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['QUINTA'][0][0]?>" name="quinta[manha_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['QUINTA'][0][1]?>" name="quinta[manha_termino]" id="quinta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['QUINTA'][1][0]?>" name="quinta[almoco_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['QUINTA'][1][1]?>" name="quinta[almoco_termino]" id="quinta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['QUINTA'][2][0]?>" name="quinta[tarde_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['QUINTA'][2][1]?>" name="quinta[tarde_termino]" id="quinta" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Sexta-Feira</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manhã</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SEXTA'][0][0]?>" name="sexta[manha_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SEXTA'][0][1]?>" name="sexta[manha_termino]" id="sexta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SEXTA'][1][0]?>" name="sexta[almoco_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SEXTA'][1][1]?>" name="sexta[almoco_termino]" id="sexta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SEXTA'][2][0]?>" name="sexta[tarde_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SEXTA'][2][1]?>" name="sexta[tarde_termino]" id="sexta" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Sábado</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manhã</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SABADO'][0][0]?>" name="sabado[manha_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SABADO'][0][1]?>" name="sabado[manha_termino]" id="sabado" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SABADO'][1][0]?>" name="sabado[almoco_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SABADO'][1][1]?>" name="sabado[almoco_termino]" id="sabado" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['SABADO'][2][0]?>" name="sabado[tarde_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['SABADO'][2][1]?>" name="sabado[tarde_termino]" id="sabado" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Domingo</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manhã</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['DOMINGO'][0][0]?>" name="domingo[manha_inicio]" id="domingo" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['DOMINGO'][0][1]?>" name="domingo[manha_termino]" id="domingo" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['DOMINGO'][1][0]?>" name="domingo[almoco_inicio]" id="domingo" class="timeFormat">
                            -
                            <input type="time" value="<?=$clinica['DOMINGO'][1][1]?>" name="domingo[almoco_termino]" id="domingo" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?=$clinica['DOMINGO'][2][0]?>" name="domingo[tarde_inicio]" id="domingo" class="timeFormat"> 
                            -
                            <input type="time" value="<?=$clinica['DOMINGO'][2][1]?>" name="domingo[tarde_termino]" id="domingo" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn center" type="submit">Editar Dados</button>
    </form>
</div>