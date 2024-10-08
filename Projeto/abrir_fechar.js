
		document.querySelectorAll('details').forEach(details => {
			details.addEventListener('toggle', event => {
				if (details.open) {
					document.querySelectorAll('details').forEach(otherDetails => {
						if (otherDetails !== details && otherDetails.open) {
							otherDetails.open = false;
						}
					});
				}
			});
		});
