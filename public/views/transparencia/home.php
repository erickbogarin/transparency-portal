<page-title>Nome da cidade | Portal Transparencia</page-title>

<content>
	<ol class="breadcrumb">
		<li><a ui-sref="index"><i class="fa fa-home"></i> Página inicial</a></li>
		<li class="active">Consulta de transparências</li>
	</ol>
	<h1 class="text-muted">{{orgao}} de {{municipio}}</h1>

	<p class="content-paragrath text-justify">A Associação Amazonense dos Municípios – AAM, buscando sempre o aperfeiçoamento de sua plataforma de transparência municipal, apresenta aos usuários um novo Portal da Transparência dos Municípios do Amazonas.
		Mais <em>moderno, intuitivo e com ferramentas de acessibilidade mais completas</em>, o Portal Transparência aprimorou seus sistemas de envio de infor	mação pelos gestores públicos, ampliando também a qualidade da interatividade do cidadão com a gestão dos recursos públicos.
	</p>
	
	<div class="form-group">
		<label>Pesquisar (mês / ano):</label>
		<div class="input-group">
			<input type="month" class="form-control ng-valid ng-dirty" placeholder="Search" ng-change="searchDB()" ng-model="filter.date" name="table_search" title="" tooltip="">
			<span ng-if="!filter.checkbox" class="input-group-addon">Procurar</span>
			<span ng-if="filter.checkbox" ng-click="resetFilters()" class="input-group-addon btn btn-primary"><i class="fa fa-filter"></i> Limpar filtro</span>	

		</div>
		</div>
	</div>

	<table class="table table-hover" ng-if="!empty">
		<thead>
			<tr>
				<th style="text-align:center">#</th>
				<th>Nome do documento</th>
				<th>Data</th>
				<th ng-if="filter.checkbox">Tipo</th>
			</tr>
		</thead>
		<tbody>
			<tr class="ng-cloak" dir-paginate="value in data | itemsPerPage:5" total-items="totalTransparencias">
				<td style="text-align:center">
					<a href="/public/{{value.link}}" target='_blank' class="btn btn-default">
						<span class="text-info fa fa-search" aria-hidden="true"></span>
					</a>					
				</td>
				<td>{{value.nome}}</td>
				<td>{{value.data}}</td>
				<td ng-if="filter.checkbox">{{value.tipo_nome}}</td>
			</tr>   
		</tbody>                
	</table>

	<div class="text-center">
		<dir-pagination-controls on-page-change="pageChanged(newPageNumber)" template-url=" views/layout/dirPagination.html">
		</dir-pagination-controls>
	</div>

	<h4 class="alert alert-warning" ng-if="emptyCities">Ainda não há registros para o orgão deste município.</h4>

</content>

<div ui-view="sidebar"></div>