

import algoliasearch from 'algoliasearch/lite';
import { autocomplete, getAlgoliaResults } from '@algolia/autocomplete-js';

import '@algolia/autocomplete-theme-classic';

const searchClient = algoliasearch(
  'latency',
  'f448da61a7a43eccbdc464b06509ed53'
);

autocomplete({
  container: '#autocomplete',
  placeholder: 'Search for products',
  getSources({ query }) {
    return [
      {
        sourceId: 'products',
        getItems() {
          return getAlgoliaResults({
            searchClient,
            queries: [
              {
                indexName: 'instant_search',
                query,
                params: {
                  hitsPerPage: 5,
                },
              },
            ],
          });
        },
        // ...
      },
    ];
  },
});
