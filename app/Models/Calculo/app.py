# Importando as bibliotecas
from flask import Flask, request
import math
import json

# Instanciando a API Flask
app = Flask(__name__)

# Criando a classe que conterá os cálculos
class SensibilidadeInsulinica:
  # Definindos os atributos da classe
  def __init__(self, cintura, doseinsulina, dbp, sexobiologico_bit, hba1c,
               glicosejejum, triglicerideos, adiponectina):
    self.cintura = cintura
    self.doseinsulina = doseinsulina
    self.dbp = dbp
    self.sexobiologico_bit = sexobiologico_bit
    self.hba1c = hba1c
    self.glicosejejum = glicosejejum
    self.triglicerideos = triglicerideos
    self.adiponectina = adiponectina
    

  # Criando os metódos que realizarão o cálculo
  # Método que realizará o cálculo da sensibilidade insulínica para pacientes
  # com diabetes tipo 1
  def Calcular_eiS_T1D(self):
    # Calcula o valor da expressão na exponencial
    valor_exponencial_T1D = 4.06154 + (-0.01317 * self.cintura) + \
                      (-1.09615 * self.doseinsulina) + \
                      (0.02027 * self.adiponectina) + \
                      (-0.00307 * self.triglicerideos) + \
                      (-0.00733 * self.dbp)
    # Calcula a exponencial
    eiS_T1D = math.exp(valor_exponencial_T1D)
    return eiS_T1D

  # Método que realizará o cálculo da sensibilidade insulínica para pacientes
  # com diabetes tipo 1 e que não fizeram jejum
  def Calcular_eiS_T1D_nonfasting(self):
    # Calcula o valor da expressão na exponencial
    valor_exponencial_T1D_nonfasting = 4.61476 + \
                                 (-1.53803 * self.doseinsulina) + \
                                 (-0.02506 * self.cintura)
    # Calcula a exponencial
    eiS_T1D_nonfasting = math.exp(valor_exponencial_T1D_nonfasting)
    return eiS_T1D_nonfasting

  # Método que realizará o cálculo da sensibilidade insulínica para pacientes
  # com diabetes tipo 1 e sem os valores de adiponectina
  def Calcular_eiS_T1D_exAdiponectina(self):
    # Calcula o valor da expressão na exponencial
    valor_exponencial_T1D_exAdiponectina = 4.1075 + \
                                     (-0.01299 * self.cintura) + \
                                     (-1.05819 * self.doseinsulina) + \
                                     (-0.00354 * self.triglicerideos) + \
                                     (-0.00802 * self.dbp)
    # Calcula a exponencial
    eiS_T1D_exAdiponectina = math.exp(valor_exponencial_T1D_exAdiponectina)
    return eiS_T1D_exAdiponectina

  # Método que realizará o cálculo da sensibilidade insulínica para pacientes
  # sem diabetes
  def Calcular_eiS_nonDiabetic(self):
    # Calcula o valor da expressao na exponencial
    valor_exponencial_nonDiabetic = 7.47237 + (-0.01275 * self.cintura) + \
                            (-0.24990 * self.hba1c) + \
                            (-0.01983 * self.glicosejejum) + \
                            (0.01905 * self.adiponectina) + \
                            (-0.00324 * self.triglicerideos) + \
                            (-0.00588 * self.dbp)
    # Calcula a exponencial
    eis_nonDiabetic = math.exp(valor_exponencial_nonDiabetic)
    return eis_nonDiabetic

  # Método que realizará o cálculo da sensibilidade insulínica para pacientes
  # sem diabetes e que não fizeram jejum
  def Calcular_eiS_nonDiabetic_nonfasting(self):
    # Calcula o valor da expressao na exponencial
    valor_exponencial_nonDiabetic_nonfasting = 6.10604 + \
                                      (0.2117 * self.sexobiologico_bit) + \
                                      (-0.28233 * self.hba1c) + \
                                      (-0.02293 * self.cintura)
    # Calcula a exponencial
    eis_nonDiabetic_nonfasting = math.exp(valor_exponencial_nonDiabetic_nonfasting)
    return eis_nonDiabetic_nonfasting

  # Método que realizará o cálculo da sensibilidade insulínica para pacientes
  # sem diabetes e sem os valores de adiponectina
  def Calcular_eiS_nonDiabetic_exAdiponectina(self):
    # Calcula o valor da expressao na exponencial
    valor_exponencial_nonDiabetic_exAdiponectina = 7.19138 + \
                                  (0.10173 * self.sexobiologico_bit) + \
                                  (-0.01414 * self.cintura) + \
                                  (-0.33308 * self.hba1c) + \
                                  (-0.01290 * self.glicosejejum) + \
                                  (-0.00316 * self.triglicerideos)
    # Calcula a exponencial
    eis_nonDiabetic_exAdiponectina = math.exp(valor_exponencial_nonDiabetic_exAdiponectina)
    return eis_nonDiabetic_exAdiponectina

# Criando as rotas de retorno do cálculo
# Rota do cálculo da sensibilidade insulínica para pacientes
# com diabetes tipo 1
@app.route("/T1D")
def T1D():
  # Verfica se o método é POST
return 'hello word'
    
# Rota do cálculo da sensibilidade insulínica para pacientes
# com diabetes tipo 1 e que não fizeram jejum
@app.route("/T1D-nonfasting", methods=["POST", "GET"])
def T1D_nonfasting():
  # Verfica se o método é POST
  if request.method == "POST":
    # Verifica se a requisição contém dados JSON
    if request.is_json:
      # Obter o JSON do corpo da requisição
      dados_json = request.get_json()
      # Deserializando o JSON
      dados = json.loads(dados_json)
      # Processando os parâmetros
      cintura = dados["medida_cintura"]
      pesocorporal = dados["peso"]
      unidadesdiarias = dados["unidade_diaria_insulina"]
      doseinsulina = unidadesdiarias/pesocorporal
      dbp = dados["pressao_arterial"]
      sexobiologico_bit = dados["sexo_biologico"]
      hba1c = dados["hba1c"]
      glicosejejum = dados["glicose_jejum"]
      triglicerideos = dados["triglicerideos"]
      adiponectina = dados["adiponectina"]
      # Instanciando o objeto 
      paciente = SensibilidadeInsulinica(cintura, doseinsulina, dbp,
                                    sexobiologico_bit, hba1c, glicosejejum,
                                    triglicerideos, adiponectina)         
      # Calculando e convertendo o valor para json 
      T1D_nonfasting = {"T1D nonfasting": paciente.Calcular_eiS_T1D_nonfasting()}
      # Retorna o valor
      return json.dumps(T1D_nonfasting)
    # Retorna erro
    errojson = {"ERROR": "A requisição deve conter dados JSON"}
    return json.dumps(errojson)
  # Se o método for GET, ele retorna uma mensagem
  elif request.method == "GET":
    mensagemget = {"INFO": "Envie uma requisicao POST"}
    return json.dumps(mensagemget)
    
# Rota do cálculo da sensibilidade insulínica para pacientes
# com diabetes tipo 1 e sem os valores de adiponectina
@app.route("/T1D-exAdiponectina")
def T1D_exAdiponectina():
  # Verfica se o método é POST
  if request.method == "POST":
    # Verifica se a requisição contém dados JSON
    if request.is_json:
      # Obter o JSON do corpo da requisição
      dados_json = request.get_json()
      # Deserializando o JSON
      dados = json.loads(dados_json)
      # Processando os parâmetros
      cintura = dados["medida_cintura"]
      pesocorporal = dados["peso"]
      unidadesdiarias = dados["unidade_diaria_insulina"]
      doseinsulina = unidadesdiarias/pesocorporal
      dbp = dados["pressao_arterial"]
      sexobiologico_bit = dados["sexo_biologico"]
      hba1c = dados["hba1c"]
      glicosejejum = dados["glicose_jejum"]
      triglicerideos = dados["triglicerideos"]
      adiponectina = dados["adiponectina"]
      # Instanciando o objeto 
      paciente = SensibilidadeInsulinica(cintura, doseinsulina, dbp,
                                    sexobiologico_bit, hba1c, glicosejejum,
                                    triglicerideos, adiponectina)    
      # Calculando e convertendo o valor para json 
      T1D_exAdiponectina = {"T1D exAdiponectina": paciente.Calcular_eiS_T1D_exAdiponectina()}
      # Retorna o valor
      return json.dumps(T1D_exAdiponectina)
    # Retorna erro
    errojson = {"ERROR": "A requisição deve conter dados JSON"}
    return json.dumps(errojson)
  # Se o método for GET, ele retorna uma mensagem
  elif request.method == "GET":
    mensagemget = {"INFO": "Envie uma requisicao POST"}
    return json.dumps(mensagemget)
    
# Rota do cálculo da sensibilidade insulínica para pacientes
# sem diabetes
@app.route("/nonDiabetic")
def nonDiabetic():
  # Verfica se o método é POST
  if request.method == "POST":
    # Verifica se a requisição contém dados JSON
    if request.is_json:
      # Obter o JSON do corpo da requisição
      dados_json = request.get_json()
      # Deserializando o JSON
      dados = json.loads(dados_json)
      # Processando os parâmetros
      cintura = dados["medida_cintura"]
      pesocorporal = dados["peso"]
      unidadesdiarias = dados["unidade_diaria_insulina"]
      doseinsulina = unidadesdiarias/pesocorporal
      dbp = dados["pressao_arterial"]
      sexobiologico_bit = dados["sexo_biologico"]
      hba1c = dados["hba1c"]
      glicosejejum = dados["glicose_jejum"]
      triglicerideos = dados["triglicerideos"]
      adiponectina = dados["adiponectina"]
      # Instanciando o objeto 
      paciente = SensibilidadeInsulinica(cintura, doseinsulina, dbp,
                                    sexobiologico_bit, hba1c, glicosejejum,
                                    triglicerideos, adiponectina)
      # Calculando e convertendo o valor para json 
      nonDiabetic = {"nonDiabetic": paciente.Calcular_eiS_nonDiabetic()}
      # Retorna o valor
      return json.dumps(nonDiabetic)
    # Retorna erro
    errojson = {"ERROR": "A requisição deve conter dados JSON"}
    return json.dumps(errojson)
  # Se o método for GET, ele retorna uma mensagem
  elif request.method == "GET":
    mensagemget = {"INFO": "Envie uma requisicao POST"}
    return json.dumps(mensagemget)      
      
# Rota do cálculo da sensibilidade insulínica para pacientes
# sem diabetes e que não fizeram jejum
@app.route("/nonDiabetic-nonfasting")
def nonDiabetic_nonfasting():
  # Verfica se o método é POST
  if request.method == "POST":
    # Verifica se a requisição contém dados JSON
    if request.is_json:
      # Obter o JSON do corpo da requisição
      dados_json = request.get_json()
      # Deserializando o JSON
      dados = json.loads(dados_json)
      # Processando os parâmetros
      cintura = dados["medida_cintura"]
      pesocorporal = dados["peso"]
      unidadesdiarias = dados["unidade_diaria_insulina"]
      doseinsulina = unidadesdiarias/pesocorporal
      dbp = dados["pressao_arterial"]
      sexobiologico_bit = dados["sexo_biologico"]
      hba1c = dados["hba1c"]
      glicosejejum = dados["glicose_jejum"]
      triglicerideos = dados["triglicerideos"]
      adiponectina = dados["adiponectina"] 
      # Calculando e convertendo o valor para json 
      nonDiabetic_nonfasting = {"nonDiabetic nonfasting": paciente.Calcular_eiS_nonDiabetic_nonfasting()}
      # Retorna o valor
      return json.dumps(nonDiabetic_nonfasting)
    # Retorna erro
    errojson = {"ERROR": "A requisição deve conter dados JSON"}
    return json.dumps(errojson)
  # Se o método for GET, ele retorna uma mensagem
  elif request.method == "GET":
    mensagemget = {"INFO": "Envie uma requisicao POST"}
    return json.dumps(mensagemget) 

# Rota do cálculo da sensibilidade insulínica para pacientes
# sem diabetes e sem os valores de adiponectina
@app.route("/nonDiabetic-exAdiponectina")
def nonDiabetic_exAdiponectina():
  # Verfica se o método é POST
  if request.method == "POST":
    # Verifica se a requisição contém dados JSON
    if request.is_json:
      # Obter o JSON do corpo da requisição
      dados_json = request.get_json()
      # Deserializando o JSON
      dados = json.loads(dados_json)
      # Processando os parâmetros
      cintura = dados["medida_cintura"]
      pesocorporal = dados["peso"]
      unidadesdiarias = dados["unidade_diaria_insulina"]
      doseinsulina = unidadesdiarias/pesocorporal
      dbp = dados["pressao_arterial"]
      sexobiologico_bit = dados["sexo_biologico"]
      hba1c = dados["hba1c"]
      glicosejejum = dados["glicose_jejum"]
      triglicerideos = dados["triglicerideos"]
      adiponectina = dados["adiponectina"] 
      # Calculando e convertendo o valor para json 
      nonDiabetic_nonfasting_exAdiponectina = {"nonDiabetic nonfastinge exAdiponectina": paciente.Calcular_eiS_nonDiabetic_exAdiponectina()}
      # Retorna o valor
      return json.dumps(nonDiabetic_nonfasting_exAdiponectina)
    # Retorna erro
    errojson = {"ERROR": "A requisição deve conter dados JSON"}
    return json.dumps(errojson)
  # Se o método for GET, ele retorna uma mensagem
  elif request.method == "GET":
    mensagemget = {"INFO": "Envie uma requisicao POST"}
    return json.dumps(mensagemget) 

# Executando a API
app.run()


 