# -*- coding: utf-8 -*-
"""Microsservico_do_calculo_ver.final

Automatically generated by Colaboratory.

Original file is located at
    https://colab.research.google.com/drive/10NHSAISlEs9nXu78QGSvQNdYnJWGKOi4
"""

# Importando as bibliotecas
import math

# Entrada dos dados clínicos do paciente
cintura = float(input("Valor da circunferência da cintura em centímetros : "))

pesocorporal = float(input("Valor do peso corporal em quilogramas : "))
unidadesdiarias = float(input("Quantidade de unidades diárias de insulina : "))
doseinsulina = unidadesdiarias/pesocorporal

dbp = float(input("Valor da DBP em milímetro de mercúrio : "))

while True:
  sexobiologico = input("Sexo biológico do paciente (Masculino/Feminino) : ")
  if sexobiologico == "Masculino":
    sexobiologico_bit = 1
    break
  elif sexobiologico == "Feminino":
    sexobiologico_bit = 0
    break
  else:
    print("Por favor, insira Masculino ou Feminino. ")

hba1c = float(input("Valor da HbA1c em porcentagem : "))

glicosejejum = float(input("Valor da glicose medida em jejum em miligramas "
                          "por decilitro : "))

triglicerideos = float(input("Valor dos níveis de triglicerídeos em "
                          "miligramas por decilitro : "))

adiponectina = float(input("Valor dos níveis de adiponectina em "
                          "microgramas por mililitro : "))

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

# Instanciando um objeto da classe
paciente = SensibilidadeInsulinica(cintura, doseinsulina, dbp,
                                    sexobiologico_bit, hba1c, glicosejejum,
                                    triglicerideos, adiponectina)

# Exibe o resultado obtido da sensibilidade insulínica para pacientes com
# diabetes tipo 1
print("Valor calculado da "
      "sensibilidade insulíninca para pacientes "
      "com diabetes tipo 1: {:.3f}".format(paciente.Calcular_eiS_T1D()))

# Exibe o resultado obtido da sensibilidade insulínica para pacientes com
# diabetes tipo 1 e que não fizeram jejum
print("Valor calculado da "
      "sensibilidade insulíninca para pacientes "
      "com diabetes tipo 1 e que não fizeram "
      "jejum: {:.3f}".format(paciente.Calcular_eiS_T1D_nonfasting()))

# Exibe o resultado obtido da sensibilidade insulínica para pacientes com
# diabetes tipo 1 e sem os valores de adiponectina
print("Valor calculado da "
      "sensibilidade insulíninca para pacientes "
      "com diabetes tipo 1 e sem os valores de "
      "adiponectina: {:.3f}".format(paciente.Calcular_eiS_T1D_exAdiponectina()))

# Exibe o resultado obtido da sensibilidade insulínica para pacientes sem
# diabetes
print("Valor calculado da sensibilidade insulíninca para pacientes "
      "sem diabetes: {:.3f}".format(paciente.Calcular_eiS_nonDiabetic()))

# Exibe o resultado obtido da sensibilidade insulínica para pacientes sem
# diabetes e que não fizeram jejum
print("Valor calculado da sensibilidade insulíninca para pacientes "
      "sem diabetes e que não fizeram "
      "jejum: {:.3f}".format(paciente.Calcular_eiS_nonDiabetic_nonfasting()))

# Exibe o resultado obtido da sensibilidade insulínica para pacientes sem
# diabetes e sem os valores de adiponectina
print("Valor calculado da sensibilidade insulíninca para pacientes "
      "sem diabetes e sem os valores de "
      "adiponectina: {:.3f}".format(paciente.Calcular_eiS_nonDiabetic_exAdiponectina()))