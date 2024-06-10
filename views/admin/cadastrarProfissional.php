<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?= $title ?>
        </h3>
    </div>
    <form id="profissional_form" method="post" action="">
        <input type="hidden" name="id_pessoa" id="id_pessoa" readonly required value="">
        <div class="item_form">
            <label for="id_pessoa">Pessoa Referente</label>
            <input type="text" name="nome_pessoa" id="nome_pessoa" value="">
            <div class="result">
                <ul class="listPessoas">
                </ul>
            </div>
        </div>
        <div class="item_form">
            <label for="registro_profissional">Registro Profissional</label>
            <input type="text" name="registro_profissional" id="registro_profissional" value="" required>
        </div>
        <div class="item_form">
            <label for="tipo_profissional">Tipo Profissional</label>
            <select name="tipo_profissional" id="tipo_profissional" required>
                <?php
                foreach ($tipo_profissional as $tipo) {
                    echo "<option value='{$tipo['ID_TIPO_PROFISSIONAL']}'>{$tipo['NOME']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="item_form">
            <label for="especialidade">Especialidades</label>
            <select name="especialidade" id="especialidade" required>
                <?php
                foreach ($especialidades as $especialidade) {
                    echo "<option value='{$especialidade['ID_ESPECIALIDADE']}'>{$especialidade['DESCRITIVO']}</option>";
                }
                ?>
            </select>
        </div>

        <h3 class="block text-center w-100">Configurações de Horários</h3>
        <div class="content_times w-100">
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Segunda-Feira</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manha</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['SEGUNDA'][0][0]) ? $clinica['SEGUNDA'][0][0] : 'readonly'  ?> name="segunda[manha_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['SEGUNDA'][0][1]) ? $clinica['SEGUNDA'][0][1] : 'readonly'  ?> name="segunda[manha_termino]" id="segunda" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $clinica['SEGUNDA'][1][0] ?>" readonly name="segunda[almoco_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="<?= $clinica['SEGUNDA'][1][1] ?>" readonly name="segunda[almoco_termino]" id="segunda" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['SEGUNDA'][2][0]) ? $clinica['SEGUNDA'][2][0] : 'readonly'  ?> name="segunda[tarde_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['SEGUNDA'][2][1]) ? $clinica['SEGUNDA'][2][1] : 'readonly'  ?> name="segunda[tarde_termino]" id="segunda" class="timeFormat">
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
                            <input type="time" value="" <?= isset($clinica['TERCA'][0][0]) ? $clinica['TERCA'][0][0] : 'readonly'  ?> name="terca[manha_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['TERCA'][0][1]) ? $clinica['TERCA'][0][1] : 'readonly'  ?> name="terca[manha_termino]" id="terca" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $clinica['TERCA'][1][0] ?>" readonly name="terca[almoco_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="<?= $clinica['TERCA'][1][1] ?>" readonly name="terca[almoco_termino]" id="terca" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['TERCA'][2][0]) ? $clinica['TERCA'][2][0] : 'readonly'  ?> name="terca[tarde_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['TERCA'][2][1]) ? $clinica['TERCA'][2][1] : 'readonly'  ?> name="terca[tarde_termino]" id="terca" class="timeFormat">
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
                            <input type="time" value="" <?= isset($clinica['QUARTA'][0][0]) ? $clinica['QUARTA'][0][0] : 'readonly'  ?> name="quarta[manha_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['QUARTA'][0][1]) ? $clinica['QUARTA'][0][1] : 'readonly'  ?> name="quarta[manha_termino]" id="quarta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $clinica['QUARTA'][1][0] ?>" readonly name="quarta[almoco_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="<?= $clinica['QUARTA'][1][1] ?>" readonly name="quarta[almoco_termino]" id="quarta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['QUARTA'][2][0]) ? $clinica['QUARTA'][2][0] : 'readonly'  ?> name="quarta[tarde_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['QUARTA'][2][1]) ? $clinica['QUARTA'][2][1] : 'readonly'  ?> name="quarta[tarde_termino]" id="quarta" class="timeFormat">
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
                            <input type="time" value="" <?= isset($clinica['QUINTA'][0][0]) ? $clinica['QUINTA'][0][0] : 'readonly'  ?> name="quinta[manha_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['QUINTA'][0][1]) ? $clinica['QUINTA'][0][1] : 'readonly'  ?> name="quinta[manha_termino]" id="quinta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $clinica['QUINTA'][1][0] ?>" readonly name="quinta[almoco_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="<?= $clinica['QUINTA'][1][1] ?>" readonly name="quinta[almoco_termino]" id="quinta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['QUINTA'][2][0]) ? $clinica['QUINTA'][2][0] : 'readonly'  ?> name="quinta[tarde_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['QUINTA'][2][1]) ? $clinica['QUINTA'][2][1] : 'readonly'  ?> name="quinta[tarde_termino]" id="quinta" class="timeFormat">
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
                            <input type="time" value="" <?= isset($clinica['SEXTA'][0][0]) ? $clinica['SEXTA'][0][0] : 'readonly'  ?> name="sexta[manha_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['SEXTA'][0][1]) ? $clinica['SEXTA'][0][1] : 'readonly'  ?> name="sexta[manha_termino]" id="sexta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $clinica['SEXTA'][1][0] ?>" readonly name="sexta[almoco_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="<?= $clinica['SEXTA'][1][1] ?>" readonly name="sexta[almoco_termino]" id="sexta" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['SEXTA'][2][0]) ? $clinica['SEXTA'][2][0] : 'readonly'  ?> name="sexta[tarde_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['SEXTA'][2][1]) ? $clinica['SEXTA'][2][1] : 'readonly'  ?> name="sexta[tarde_termino]" id="sexta" class="timeFormat">
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
                            <input type="time" value="" <?= isset($clinica['SABADO'][0][0]) ? $clinica['SABADO'][0][0] : 'readonly'  ?> name="sabado[manha_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['SABADO'][0][1]) ? $clinica['SABADO'][0][1] : 'readonly'  ?> name="sabado[manha_termino]" id="sabado" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $clinica['SABADO'][1][0] ?>" readonly name="sabado[almoco_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="<?= $clinica['SABADO'][1][1] ?>" readonly name="sabado[almoco_termino]" id="sabado" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['SABADO'][2][0]) ? $clinica['SABADO'][2][0] : 'readonly'  ?> name="sabado[tarde_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['SABADO'][2][1]) ? $clinica['SABADO'][2][1] : 'readonly'  ?> name="sabado[tarde_termino]" id="sabado" class="timeFormat">
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
                            <input type="time" value="" <?= isset($clinica['DOMINGO'][0][0]) ? $clinica['DOMINGO'][0][0] : 'readonly'  ?> name="domingo[manha_inicio]" id="domingo" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['DOMINGO'][0][1]) ? $clinica['DOMINGO'][0][1] : 'readonly'  ?> name="domingo[manha_termino]" id="domingo" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Almoço</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $clinica['DOMINGO'][1][0] ?>" readonly name="domingo[almoco_inicio]" id="domingo" class="timeFormat">
                            -
                            <input type="time" value="<?= $clinica['DOMINGO'][1][1] ?>" readonly name="domingo[almoco_termino]" id="domingo" class="timeFormat">
                        </div>
                    </div>
                    <div class="item_time">
                        <label for="cidade">Tarde</label>
                        <div class="content_inputs_time">
                            <input type="time" value="" <?= isset($clinica['DOMINGO'][2][0]) ? $clinica['DOMINGO'][2][0] : 'readonly'  ?> name="domingo[tarde_inicio]" id="domingo" class="timeFormat">
                            -
                            <input type="time" value="" <?= isset($clinica['DOMINGO'][2][1]) ? $clinica['DOMINGO'][2][1] : 'readonly'  ?> name="domingo[tarde_termino]" id="domingo" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn center" type="submit">Cadastrar Profissional</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#nome_pessoa').addEventListener('keyup', function(e) {
            e.preventDefault();
            let nome = e.target.value;

            document.querySelector('.result').style.display = 'block';

            const requestOptions = {
                method: "GET",
                redirect: "follow"
            };

            fetch(`${base_url}/api/pessoas${nome && '/' + nome}`, requestOptions)
                .then((response) => response.text())
                .then((result) => {
                    result = JSON.parse(result);
                    console.log(result);
                    document.querySelector('.listPessoas').innerHTML = result.length > 0 ? '' : 'Nenhum resultado encontrado';
                    result.forEach(element => {
                        document.querySelector('.listPessoas').innerHTML += `<li data-id='${element.ID_PESSOA}' onclick='selectPessoa(event)'>${element.NOME}</li>`;
                    })
                })
                .catch((error) => console.error(error));
        })
    });

    const selectPessoa = (e) => {
        const id = e.target.getAttribute('data-id');
        const nome = e.target.innerText;
        document.querySelector('#id_pessoa').value = id;
        document.querySelector('#nome_pessoa').value = nome;
        document.querySelector('.listPessoas').innerHTML = '';
        document.querySelector('.result').style.display = 'none';
    };

</script>