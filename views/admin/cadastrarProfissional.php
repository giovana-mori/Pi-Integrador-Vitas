<div class="content_ content_perfil">
    <div class="bloco_titulo">
        <h3 class="title_admin">
            <?= $title ?>
        </h3>
    </div>
    <form id="profissional_form" method="post" action="">
        <?php
        if (isset($profissional)) :
            echo "<input type='hidden' name='id_profissional' id='id_profissional' value='{$profissional['id_profissional']}'>";
            echo "<input type='hidden' name='id_pessoa' id='id_pessoa' value='{$profissional['PESSOA_ID']}'>";
            echo "<input type='text' name='search_people' readonly id='search_people' value='{$profissional['NOME']}'>";
        else :
        ?>
            <input type="hidden" name="id_pessoa" id="id_pessoa" readonly required value="<?= $profissional['PESSOA_ID'] ?? '' ?>">
            <div class="item_form">
                <label for="id_pessoa">Pessoa Referente</label>
                <div class="relative">
                    <input type="text" name="nome_pessoa" autocomplete="off" id="nome_pessoa" required onkeypress="return false;" value="<?= $profissional['NOME'] ?? '' ?>">
                    <div class="result">
                        <input type="text" name="search_people" id="search_people" value="">
                        <ul class="listPessoas"></ul>
                    </div>
                </div>
            </div>
        <?php
        endif;
        ?>
        <div class="item_form">
            <label for="registro_profissional">Registro Profissional</label>
            <input type="text" name="registro_profissional" id="registro_profissional" value="<?= $profissional['registroclasseprofissional'] ?? '' ?>" required>
        </div>
        <div class="item_form">
            <label for="tipo_profissional">Tipo Acesso</label>
            <select name="tipo_profissional" id="tipo_profissional" required>
                <?php
                if (isset($profissional['descritivo'])) {
                    foreach ($tipos_profissional as $tipo) {
                        echo "<option value='{$tipo['ID_TIPO_PROFISSIONAL']}' " . ($tipo['NOME'] == $profissional['tipo'] ? 'selected' : '') . ">{$tipo['NOME']}</option>";
                    }
                } else {
                    foreach ($tipos_profissional as $tipo) {
                        echo "<option value='{$tipo['ID_TIPO_PROFISSIONAL']}' " . ">{$tipo['NOME']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="item_form">
            <label for="tipo_especialidade">Profissão</label>
            <select id="tipo_especialidade" required>
                <option value="">Selecione uma Profissão</option>
                <?php
                if (isset($profissional['tipo_profissao'])) {
                    foreach ($tipos as $especialidade) {
                        echo "<option value='{$especialidade['TIPO']}' " . ($especialidade['TIPO'] == $profissional['tipo_profissao'] ? 'selected' : '') . ">{$especialidade['TIPO']}</option>";
                    }
                } else {
                    foreach ($tipos as $especialidade) {
                        echo "<option value='{$especialidade['TIPO']}' " . ">{$especialidade['TIPO']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="item_form">
            <label for="especialidade">Especialidades</label>
            <select name="especialidade" id="especialidade" required>
                <option value="">Selecione uma especialidade</option>
                <?php
                if (isset($profissional['descritivo'])) {
                    foreach ($especialidades as $especialidade) {
                        echo "<option style='display:none' data-tipo='{$especialidade['TIPO']}' value='{$especialidade['ID_ESPECIALIDADE']}' " . ($especialidade['DESCRITIVO'] == $profissional['descritivo'] ? 'selected' : '') . ">{$especialidade['DESCRITIVO']}</option>";
                    }
                } else {
                    foreach ($especialidades as $especialidade) {
                        echo "<option style='display:none' data-tipo='{$especialidade['TIPO']}' value='{$especialidade['ID_ESPECIALIDADE']}' " . ">{$especialidade['DESCRITIVO']}</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="item_form">
            <label for="duracao">Duração Atendimento (minutos)</label>
            <input type="number" name="duracao" id="duracao" value="60" required>
        </div>

        <h3 class="block text-center w-100">Configurações de Horários</h3>
        <div class="content_times w-100">
            <div class="box_all_item_time">
                <h3 class="text-center w-100">Segunda-Feira</h3>
                <div class="box_time">
                    <div class="item_time">
                        <label for="cidade">Manha</label>
                        <div class="content_inputs_time">
                            <input type="time" value="<?= $horarios['segunda']['manha']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['SEGUNDA'][0][0]) ? $clinica['SEGUNDA'][0][0] : 'readonly'  ?> name="segunda[manha_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['segunda']['manha']['HORA_FIM'] ?? null ?>" <?= isset($clinica['SEGUNDA'][0][1]) ? $clinica['SEGUNDA'][0][1] : 'readonly'  ?> name="segunda[manha_termino]" id="segunda" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['segunda']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['SEGUNDA'][2][0]) ? $clinica['SEGUNDA'][2][0] : 'readonly'  ?> name="segunda[tarde_inicio]" id="segunda" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['segunda']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['SEGUNDA'][2][1]) ? $clinica['SEGUNDA'][2][1] : 'readonly'  ?> name="segunda[tarde_termino]" id="segunda" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['terca']['manha']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['TERCA'][0][0]) ? $clinica['TERCA'][0][0] : 'readonly'  ?> name="terca[manha_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['terca']['manha']['HORA_FIM'] ?? null ?>" <?= isset($clinica['TERCA'][0][1]) ? $clinica['TERCA'][0][1] : 'readonly'  ?> name="terca[manha_termino]" id="terca" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['terca']['tarde']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['TERCA'][2][0]) ? $clinica['TERCA'][2][0] : 'readonly'  ?> name="terca[tarde_inicio]" id="terca" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['terca']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['TERCA'][2][1]) ? $clinica['TERCA'][2][1] : 'readonly'  ?> name="terca[tarde_termino]" id="terca" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['quarta']['manha']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['QUARTA'][0][0]) ? $clinica['QUARTA'][0][0] : 'readonly'  ?> name="quarta[manha_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['quarta']['manha']['HORA_FIM'] ?? null ?>" <?= isset($clinica['QUARTA'][0][1]) ? $clinica['QUARTA'][0][1] : 'readonly'  ?> name="quarta[manha_termino]" id="quarta" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['quarta']['tarde']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['QUARTA'][2][0]) ? $clinica['QUARTA'][2][0] : 'readonly'  ?> name="quarta[tarde_inicio]" id="quarta" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['quarta']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['QUARTA'][2][1]) ? $clinica['QUARTA'][2][1] : 'readonly'  ?> name="quarta[tarde_termino]" id="quarta" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['quinta']['manha']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['QUINTA'][0][0]) ? $clinica['QUINTA'][0][0] : 'readonly'  ?> name="quinta[manha_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['quinta']['manha']['HORA_FIM'] ?? null ?>" <?= isset($clinica['QUINTA'][0][1]) ? $clinica['QUINTA'][0][1] : 'readonly'  ?> name="quinta[manha_termino]" id="quinta" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['quinta']['tarde']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['QUINTA'][2][0]) ? $clinica['QUINTA'][2][0] : 'readonly'  ?> name="quinta[tarde_inicio]" id="quinta" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['quinta']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['QUINTA'][2][1]) ? $clinica['QUINTA'][2][1] : 'readonly'  ?> name="quinta[tarde_termino]" id="quinta" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['sexta']['manha']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['SEXTA'][0][0]) ? $clinica['SEXTA'][0][0] : 'readonly'  ?> name="sexta[manha_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['sexta']['manha']['HORA_FIM'] ?? null ?>" <?= isset($clinica['SEXTA'][0][1]) ? $clinica['SEXTA'][0][1] : 'readonly'  ?> name="sexta[manha_termino]" id="sexta" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['sexta']['tarde']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['SEXTA'][2][0]) ? $clinica['SEXTA'][2][0] : 'readonly'  ?> name="sexta[tarde_inicio]" id="sexta" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['sexta']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['SEXTA'][2][1]) ? $clinica['SEXTA'][2][1] : 'readonly'  ?> name="sexta[tarde_termino]" id="sexta" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['sabado']['manha']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['SABADO'][0][0]) ? $clinica['SABADO'][0][0] : 'readonly'  ?> name="sabado[manha_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['sabado']['manha']['HORA_FIM'] ?? null ?>" <?= isset($clinica['SABADO'][0][1]) ? $clinica['SABADO'][0][1] : 'readonly'  ?> name="sabado[manha_termino]" id="sabado" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['sabado']['tarde']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['SABADO'][2][0]) ? $clinica['SABADO'][2][0] : 'readonly'  ?> name="sabado[tarde_inicio]" id="sabado" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['sabado']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['SABADO'][2][1]) ? $clinica['SABADO'][2][1] : 'readonly'  ?> name="sabado[tarde_termino]" id="sabado" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['domingo']['manha']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['DOMINGO'][0][0]) ? $clinica['DOMINGO'][0][0] : 'readonly'  ?> name="domingo[manha_inicio]" id="domingo" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['domingo']['manha']['HORA_FIM'] ?? null ?>" <?= isset($clinica['DOMINGO'][0][1]) ? $clinica['DOMINGO'][0][1] : 'readonly'  ?> name="domingo[manha_termino]" id="domingo" class="timeFormat">
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
                            <input type="time" value="<?= $horarios['domingo']['tarde']['HORA_INICIO'] ?? null ?>" <?= isset($clinica['DOMINGO'][2][0]) ? $clinica['DOMINGO'][2][0] : 'readonly'  ?> name="domingo[tarde_inicio]" id="domingo" class="timeFormat">
                            -
                            <input type="time" value="<?= $horarios['domingo']['tarde']['HORA_FIM'] ?? null ?>" <?= isset($clinica['DOMINGO'][2][1]) ? $clinica['DOMINGO'][2][1] : 'readonly'  ?> name="domingo[tarde_termino]" id="domingo" class="timeFormat">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn center" type="submit"><?= isset($horarios) ? "Editar" : "Cadastrar" ?> Profissional</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('#nome_pessoa')?.addEventListener('click', (e) => {
            e.preventDefault;
            //inicializar o ponteiro de digitacao no #search_people
            document.querySelector('#search_people').value = '';
            //mostrar o .result
            document.querySelector('.result').style.display = 'block';
            //inicializar o ponteiro de digitacao no #search_people
            document.querySelector('#search_people').focus();
        });

        //se clicar fora do #nome_pessoa, #search_people ou .result, fechar o .result   
        document.addEventListener('click', (e) => {
            //ou se apertar esc tambem sai
            if (e.target.id !== 'nome_pessoa' && e.target.id !== 'search_people' && e.target.className !== 'result') {
                document.querySelector('.result').style.display = 'none';
            }
        });

        document.querySelector("#tipo_especialidade").addEventListener('change', selectTipo);

        //keyup and focus
        document.querySelector('#search_people').addEventListener('keyup', eventSearchPessoa)
        document.querySelector('#search_people').addEventListener('focus', eventSearchPessoa)
    });

    const eventSearchPessoa = (e) => {
        e.preventDefault();
        let nome = e.target.value;
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
    }

    const selectTipo = (e) => {
        e.preventDefault();
        const tipo = e.target.value;
        //reset selected value in "#especialidade
        document.querySelector('#especialidade').value = '';
        document.querySelectorAll("#especialidade option").forEach(element => {
            element.style.display = tipo == element.dataset.tipo ? 'block' : 'none';
        })
    }

    const selectPessoa = (e) => {
        e.preventDefault();
        const id = e.target.getAttribute('data-id');
        const nome = e.target.innerText;
        document.querySelector('#id_pessoa').value = id;
        document.querySelector('#nome_pessoa').value = nome;
        document.querySelector('#search_people').value = nome;
        document.querySelector('.listPessoas').innerHTML = '';
        document.querySelector('.result').style.display = 'none';
    };
</script>