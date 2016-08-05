<page-title>Portal da Transparência</page-title>

<h3 class="text-welcome">
	<i class="fa fa-bank" aria-hidden="true"></i>
	Governo do Estado do Amazonas <small><em>site demonstrativo</em></small>
</h3>

<p class="content-paragrath text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper arcu eget facilisis aliquet. In eget aliquam libero. Fusce semper a diam sit amet condimentum. Integer at neque id velit tristique scelerisque. Curabitur molestie condimentum ante sit amet finibus. Aliquam porttitor, mauris quis ultricies varius, leo justo finibus dolor, in ullamcorper est risus sit amet metus. Nullam sit amet orci ut nulla facilisis aliquam.
</p>

<h3>Escolha um município:</h3>
<div class="input-group">
	<input type="text" class="form-control ng-valid ng-dirty" placeholder="Nome da cidade" ng-change="searchDB()" ng-model="model.searchText" name="table_search" title="" tooltip="" ng-model-options="{ debounce: 500 }">
	<span class="input-group-addon">Procurar</span>
</div>

<div class="content-cities row">
	<div class="list-group ng-cloak col-sm-6 col-md-4" dir-paginate="value in data | itemsPerPage:12" total-items="totalCities">
		<button id="dLabel" class="list-group-item city-item" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<h5 class="text-info" style="text-align: center;text-transform: uppercase">
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

<!--<div ui-view="sidebar"></div>-->