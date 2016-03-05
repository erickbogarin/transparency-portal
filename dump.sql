
-- -----------------------------------------------------
-- Table Estado
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Estado (
  id INT NOT NULL,
  nome VARCHAR(20) NOT NULL,
  uf VARCHAR(3) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX nome_UNIQUE (nome ASC),
  UNIQUE INDEX uf_UNIQUE (uf ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Municipio
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Municipio (
  id INT NOT NULL,
  nome VARCHAR(50) NOT NULL,
  estado_id INT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX nome_UNIQUE (nome ASC),
  INDEX FK_CidadeEstado_idx (estado_id ASC),
  CONSTRAINT FK_CidadeEstado
    FOREIGN KEY (estado_id)
    REFERENCES Estado (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Orgao
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Orgao (
  id INT NOT NULL,
  nome ENUM('Prefeitura', 'Camara') NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Setor
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Setor (
  id INT NOT NULL,
  nome VARCHAR(35) NOT NULL,
  representante VARCHAR(50) NOT NULL,
  endereco VARCHAR(75) NOT NULL,
  telefone VARCHAR(11) NULL,
  horario_atendimento VARCHAR(20) NOT NULL,
  orgao_id INT NULL,
  municipio_id INT NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX nome_UNIQUE (nome ASC),
  INDEX FK_SetorMunicipio_idx (orgao_id ASC),
  INDEX FK_SetorMunicipio_idx1 (municipio_id ASC),
  CONSTRAINT FK_SetorOrgao
    FOREIGN KEY (orgao_id)
    REFERENCES Orgao (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT FK_SetorMunicipio
    FOREIGN KEY (municipio_id)
    REFERENCES Municipio (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Transparencia
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Transparencia (
  id INT NOT NULL,
  tipo ENUM('Receitas', 'Despesas', 'Balancos', 'LRF - Responsabilidade Fiscal', 'Planejamento Orcamentario', 'Convenios', 'Contratos e Licitacoes', 'Servidores', 'Atos Oficiais', 'Secretarias e Orgaos') NULL,
  orgao_id INT NULL,
  municipio_id INT NULL,
  PRIMARY KEY (id),
  INDEX FK_TransparenciaMunicipio_idx (municipio_id ASC),
  INDEX FK_TransparenciaOrgao_idx (orgao_id ASC),
  CONSTRAINT FK_TransparenciaMunicipio
    FOREIGN KEY (municipio_id)
    REFERENCES Municipio (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT FK_TransparenciaOrgao
    FOREIGN KEY (orgao_id)
    REFERENCES Orgao (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table Arquivo
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS Arquivo (
  id INT NOT NULL,
  nome VARCHAR(45) NOT NULL,
  data DATE NOT NULL,
  link VARCHAR(100) NOT NULL,
  transparencia_id INT NULL,
  PRIMARY KEY (id),
  INDEX FK_ArquivoTransparencia_idx (transparencia_id ASC),
  CONSTRAINT FK_ArquivoTransparencia
    FOREIGN KEY (transparencia_id)
    REFERENCES Transparencia (id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
