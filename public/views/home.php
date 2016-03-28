<page-title>Portal Transparencia</page-title>

<content>	
	
	<h1 class="text-primary">Bem-vindo ao Portal</h1>

	<p class="content-paragrath text-justify">A Associação Amazonense dos Municípios – AAM, buscando sempre o aperfeiçoamento de sua plataforma de transparência municipal, apresenta aos usuários um novo Portal da Transparência dos Municípios do Amazonas.
		Mais <em>moderno, intuitivo e com ferramentas de acessibilidade mais completas</em>, o Portal Transparência aprimorou seus sistemas de envio de informação pelos gestores públicos, ampliando também a qualidade da interatividade do cidadão com a gestão dos recursos públicos.
	</p>

	<h3>Escolha o município desejado:</h3>
	<div class="input-group">
		<input type="text" class="form-control ng-valid ng-dirty" placeholder="Nome da cidade" ng-change="searchDB()" ng-model="model.searchText" name="table_search" title="" tooltip="" ng-model-options="{ debounce: 500 }">
		<span class="input-group-addon">Procurar</span>
	</div>

	<div class="content-cities row">
		<div class="list-group ng-cloak col-sm-6 col-md-4" dir-paginate="value in data | itemsPerPage:12" total-items="totalCities">
			<button id="dLabel" class="list-group-item city-item" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<h5 class="text-info" style="text-align: center;">
					{{value.nome}}
					<span class="caret"></span>
				</h5>
				</button>
				<ul style="width: 100%;" class="dropdown-menu">
					<li class="dropdown-header">Consultar transparências</li>
					<li role="separator" class="divider"></li>
					<li><a href="transparencias/Prefeitura/{{value.nome}}">
							<i class="fa fa-university"></i> Prefeitura
						</a>
					</li>
					<li role="separator" class="divider"></li>
					<li><a href="transparencias/Camara/{{value.nome}}">		
							<i class="fa fa-building-o"></i> Camara
						</a>
					</li>
				</ul>
			</div>
			<h4 class="alert alert-warning" ng-if="empty">Cidade não encontrada.</h4>
			<div class="text-center">
				<dir-pagination-controls on-page-change="pageChanged(newPageNumber)" template-url="	views/layout/dirPagination.html">
			</dir-pagination-controls>
		</div>
	</div>

</content>	

<div ui-view="sidebar"></div>