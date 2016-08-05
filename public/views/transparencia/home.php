<page-title>Nome da cidade | Portal Transparencia</page-title>

<content>
	<ol class="breadcrumb">
		<li><a ui-sref="index">Página inicial</a></li>
		<li class="active">Consulta de transparências</li>
	</ol>
	<h1 class="text-muted">{{orgao}} de {{municipio}}</h1>

	<div class="form-group">
		<label>Pesquisar (mês / ano):</label>
		<div class="input-group">
			<input data-mask="99/9999" placeholder="Data"
				   class="form-control ng-valid ng-dirty" ng-change="searchDB()" ng-model="filter.date" name="table_search" title="" tooltip="">
			<span ng-if="!filter.checkbox" class="input-group-addon">Procurar</span>
			<span ng-if="filter.checkbox" ng-click="resetFilters()" class="input-group-addon btn btn-primary"><i class="fa fa-filter"></i> Limpar filtro</span>	

		</div>
		</div>
	</div>

	<table class="table table-striped table-bordered table-hover" ng-if="!empty">
		<thead>
			<tr>
				<th style="text-align:center"><i class="fa fa-folder-open-o" aria-hidden="true"></i></th>
				<th>Nome do documento</th>
				<th>Data de entrada</th>
				<th ng-if="filter.checkbox">Tipo</th>
			</tr>
		</thead>
		<tbody data-link="row" class="rowlink">
			<tr class="ng-cloak" dir-paginate="value in data | itemsPerPage:5" total-items="totalTransparencias">
				<td style="text-align:center">
					<a href="/public/{{value.link}}" target='_blank' >
						<span class="text-danger fa fa-file-pdf-o" aria-hidden="true"></span>

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

